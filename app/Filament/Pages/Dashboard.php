<?php
 
namespace App\Filament\Pages;
 
use Filament\Pages\Dashboard as BasePage;
 
class Dashboard extends BasePage
{
    public static ?string $icon = 'heroicon-o-home';
 
    public static ?string $title = 'Dashboard';
 
    protected int | string | array $columnSpan = 2;

    protected function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverview::class,
            \App\Filament\Resources\InstituteResource\Widgets\InstituteRegistrationChart::class,
            \App\Filament\Resources\UserResource\Widgets\UserRegistrationChart::class,
            \Ekremogul\FilamentGoogleAnalyticsRealtime\Widgets\RealtimeAnalytics::class,
            /* \App\Filament\Resources\CourseResource\Widgets\CourseOverview::class, */            
        ];
    }

}