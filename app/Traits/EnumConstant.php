<?php

namespace App\Traits;

use Illuminate\Support\Str;


Trait EnumConstant
{
    /**
     * values - returnes the values of the enum.
     *
     * @param  bool $inverse
     * @return array
     */
    static function values(?bool $inverse = false){
        $reflection = new \ReflectionClass(__CLASS__);


        if($inverse == false) {
            return $reflection->getConstants();
        } else {
            $values = $reflection->getConstants();
            $inverse = [];
            foreach($values as $key => $value){
                $key = Str::replace('_', ' ', $key); //If in case we have a key with underscore, we replace it with a space.
                $inverse[$value] = Str::ucfirst(Str::lower($key));
            }

            return $inverse;
        }
    }

    /**
     * value - Get the value of the constant.
     *
     * @param  const $const
     * @return string
     */
    static function value($const) {
        return self::values($inverse = true)[$const];
    }

    /**
     * label - Get the label of the trait
     *
     * @param  mixed $value
     * @return string
     */
    static function label($value, $raw = false) {

        $label = array_flip(self::values())[$value];

        if($raw == true) {
            return $label;
        } else {
            return Str::ucfirst(
                Str::lower($label)
            );
        }
    }





}

?>
