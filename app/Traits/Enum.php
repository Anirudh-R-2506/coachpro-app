<?php

namespace App\Traits;
use App\Exceptions\EnumException;

trait Enum {

    protected $colors = [
        'success' => '#15803D',
        'danger' => '#BE123C',
        'warning' => '#D97706',
        'info' => '#0C7B93',
        'primary' => '#0D6EFD',
        'secondary' => '#6C757D',
    ];

    protected function getEnum(string $key = null): array
    {
        if ($key === null) {
            return [];
        }
        if (!array_key_exists($key, $this->enums)) {
            throw new EnumException('Enum key not found');
        }
        return $this->enums[$key];
    }

    protected function getColor($color = ''): string
    {
        if (array_key_exists($color, $this->colors)) {
            return $this->colors[$color];
        }
        if (preg_match('/^#[a-f0-9]{6}$/i', $color)) {
            return $color;
        }
        if (substr($color, 0, 4) === 'rgb(' || substr($color, 0, 5) === 'rgba(') {
            return $color;
        }
        return $this->colors['primary'];
    }

    protected function checkEnums(): void
    {
        $this->checkLabels();
        $this->checkValues();
        $this->checkColors();
        $this->checkIcons();
    }

    protected function checkColors(): void
    {
        $enums = $this->enums;
        foreach ($enums as $key => $enum) {
            foreach ($enum as $key2 => $value) {
                if (!array_key_exists('color', $value)) {
                    $value['color'] = 'primary';
                }
            }
        }
    }

    protected function checkIcons(): void
    {
        $enums = $this->enums;
        foreach ($enums as $key => $enum) {
            foreach ($enum as $key2 => $value) {
                if (!array_key_exists('icon', $value)) {
                    $value['icon'] = 'circle';
                }
            }
        }
    }

    protected function checkValues(): void
    {
        $enums = $this->enums;
        foreach ($enums as $key => $enum) {
            foreach ($enum as $key2 => $value) {
                if (!array_key_exists('value', $value)) {
                    throw new EnumException('Enum value not found for ' . $key . ' from model: ' . get_called_class());
                }
            }
        }
    }

    protected function checkLabels(): void
    {
        $enums = $this->enums;
        foreach ($enums as $key => $enum) {
            foreach ($enum as $key2 => $value) {
                if (!array_key_exists('label', $value)) {
                    $value['label'] = $key;
                }
            }
        }
    }

    protected function hex2rgba($color, $opacity = false): string
    {

        if (empty($color))
            return 'rgba(0,0,0,0)';

        if (in_array($color, $this->colors)) {
            $color = array_search($color, $this->colors);
        }

        $default = 'rgb(0,0,0)';

        if(empty($color))
              return $default; 
        
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }
            
        $rgb =  array_map('hexdec', $hex);
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
     
        return $output;
    }

    protected function setEnum(string $key): self
    {
        $enums = $this->enums();
        if (array_key_exists($key, $enums)) {
            $this->enum = $enums[$key];
            return $this;
        } else {
            throw new EnumException('Enum not defined: ' . $key . ' from model: ' . get_called_class());
        }
    }

    protected function checkEnum(): void
    {        
        if (empty($this->enum)) {
            throw new EnumException('Enum not defined for model: ' . get_called_class() . ". Call enum() method first. (ex: \$model->enum('status')) [From function: " . debug_backtrace()[1]['function'] . "()]");
        }
    }

    public static function enum(string $key, ?bool $inverse = false): self
    {        
        $self = new self;
        $enums = $self->enums();
        if (array_key_exists($key, $enums)) {
            return $self->setEnum($key);
        }
        throw new EnumException('Enum not defined for model: ' . get_called_class() . ". Call enum() method first. (ex: \$model->enum('status')) [From function: " . debug_backtrace()[1]['function'] . "()]");
    }

    public function getFilter()
    {
        $response = [];
        foreach ($this->enum as $key => $value) {
            $response[$value['value']] = $value['label'];
        }
        return $response;
    }

    public function keys(): array
    {
        $this->checkEnum();
        return array_keys($this->enum);
    }

    public function json(): string
    {
        $this->checkEnum();
        return json_encode($this->enum);
    }

    public function values(): array
    {
        $this->checkEnum();
        $response = [];
        foreach ($this->enum as $key => $value) {
            array_push($response, $value['value']);
        }
        return $response;
    }

    public function colors(): array
    {
        $this->checkEnum();
        $response = [];
        foreach ($this->enum as $key => $value) {
            array_push($response, $this->getColor($value['color']));
        }
        return $response;
    }

    public function icons(): array
    {
        $this->checkEnum();
        $response = [];
        foreach ($this->enum as $key => $value) {
            array_push($response, $value['icon']);
        }
        return $response;
    }    

    public function getEnumFromValue($value)
    {
        $this->checkEnum();
        foreach ($this->enum as $key => $enum) {
            if ($enum['value'] == $value) {
                return $enum;
            }
        }
    }

    public function getBadge($value): string
    {
        $this->checkEnum();
        $enum = $this->getEnumFromValue($value);
        $label = $enum['label'];
        $color = $enum['color'];
        $icon = $enum['icon'];
        $bg = $this->getColor($color);

        $div = "<div style='color: $color; letter-spacing: -.025em; font-weight: 500; font-size: .875rem; line-height: 1.25rem; padding-bottom: 0.25rem; padding-top: 0.25rem; padding-left: 0.6rem; padding-right: 0.6rem; background-color: $bg; border-radius: 0.75rem; white-space: nowrap; justify-content: center; align-items: center; display: inline-flex; border: 0 solid #e5e7eb; box-sizing: border-box;'>";        
        $icon = "<i class='fas fa-$icon' style='width: 1rem; height: 1rem; margin-right: 0.25rem; color: white;'></i>";
        $text = "<span style='color: white;'>$label</span></div>";

        return $div . $icon . $text;
    }

    public function filament(): array
    {
        $this->checkEnum();
        $response = [];
        foreach ($this->enum as $key => $value) {
            $response[$value['value']] = $value['label'];
        }
        return $response;
    }

    public function filamentColors(): array
    {
        $this->checkEnum();
        $response = [];
        foreach ($this->enum as $key => $value) {
            $response[$value['color']] = $value['value'];
        }
        return $response;
    }

}