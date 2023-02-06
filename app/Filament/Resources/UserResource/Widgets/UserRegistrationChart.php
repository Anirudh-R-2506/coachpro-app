<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\LineChartWidget;
use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class UserRegistrationChart extends LineChartWidget
{
    protected static ?string $heading = 'Users Registered';

    public ?string $filter = 'week';

    protected static ?int $sort = 2;

    protected static ?string $icon = 'heroicon-o-users';

    protected static ?string $pollingInterval = '10s';

    protected static ?string $maxHeight = '300px';

    protected int | string | array $columnSpan = [
        'md' => 2,
    ];

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
    ];

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }

    protected function getTimeFormat(string $time_string): ?string
    {
        $activeFilter = $this->filter;
        $time = strtotime($time_string);
        switch ($activeFilter) {
            case 'today':
                return date('H:i', $time);
                break;
            case 'week':
                return date('D', $time);
                break;
            case 'month':
                return date('d M', $time);
                break;
            case 'year':
                return date('M', $time);
                break;
            default:
                return date('H:i', $time);
                break;
        }
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        
        switch ($activeFilter) {
            case 'today':
                $data = Trend::model(User::class)
                    ->between(now()->subDay(), now())
                    ->perHour()
                    ->count();
                break;
            case 'week':
                $data = Trend::model(User::class)                    
                    ->between(now()->subWeek(), now())
                    ->perDay()
                    ->count();
                break;
            case 'month':
                $data = Trend::model(User::class)
                    ->between(now()->subMonth(), now())
                    ->perDay()
                    ->count();
                break;
            case 'year':
                $data = Trend::model(User::class)
                    ->between(now()->subYear(), now())
                    ->perMonth()
                    ->count();
                break;
            default:
                $data = Trend::model(User::class)
                    ->between(now()->subWeek(), now())
                    ->perHour()
                    ->count();
                break;
        }
        
        return [

            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            
            'labels' => $data->map(fn (TrendValue $value) => $this->getTimeFormat($value->date)),

        ];
    }
}
