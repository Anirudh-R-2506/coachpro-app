<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\Contact;
use Carbon\Carbon;
use App\Enums\AccountStatus;
use App\Enums\UserRole;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 0;

    protected static ?string $heading = 'Overview';

    protected static ?string $icon = 'heroicon-o-home';

    protected function getColor(int $value): string
    {

        if ($value > 0) {
            return 'success';
        } else if ($value < 0) {
            return 'danger';
        } else {
            return 'gray';
        }
    }

    protected function getIcon(int $value): string
    {

        if ($value > 0) {
            return 'heroicon-s-trending-up';
        } else if ($value < 0) {
            return 'heroicon-s-trending-down';
        } else {
            return 'heroicon-s-trending-down';
        }

    }

    protected function getGraph(int $value): array
    {

        if ($value > 0) {
            return [1, 10, 20, 30, 40, 50, 60, 70];
        } else if ($value < 0) {
            return [70, 60, 50, 40, 30, 20, 10, 1];
        } else {
            return [2, 2, 2, 2, 2, 2, 2, 2];
        }

    }

    protected function getStudentDataDiff(): array
    {
        $current_week = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('role', UserRole::STUDENT)->count();
        $last_week = User::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->where('role', UserRole::STUDENT)->count();
        $diff = $current_week - $last_week;
        return [
            'value' => $diff,
            'color' => $this->getColor($diff),
            'icon' => $this->getIcon($diff),
        ];
    }

    protected function getInstDataDiff(): array
    {
        $current_week = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('role', UserRole::INSTITUTE)->count();
        $last_week = User::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->where('role', UserRole::INSTITUTE)->count();
        $diff = $current_week - $last_week;
        return [
            'value' => $diff,
            'color' => $this->getColor($diff),
            'icon' => $this->getIcon($diff),
        ];
    }

    protected function getContactDataDiff(): array
    {
        $current_week = Contact::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $last_week = Contact::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count();
        $diff = $current_week - $last_week;
        return [
            'value' => $diff,
            'color' => $this->getColor($diff),
            'icon' => $this->getIcon($diff),
        ];
    }

    protected function getDescription(int $value): string
    {
        return $value > 0 ? $value . ' increase' : ( $value * -1). ' decrease';
    }

    protected function getStudents(): Card
    {

        $diff = $this->getStudentDataDiff();

        return Card::make('Students', User::where('role', UserRole::STUDENT)->count())
        ->description($this->getDescription($diff['value']))
        ->descriptionIcon($diff['icon'])
        ->chart($this->getGraph($diff['value']))
        ->color($diff['color']);
    }

    protected function getContacts(): Card
    {

        $diff = $this->getContactDataDiff();

        return Card::make('Contacts', Contact::count())
        ->description($this->getDescription($diff['value']))
        ->descriptionIcon($diff['icon'])
        ->chart($this->getGraph($diff['value']))
        ->color($diff['color']);
    }

    protected function getInst(): Card
    {

        $diff = $this->getInstDataDiff();

        return Card::make('Institutes', User::where('role', UserRole::INSTITUTE)->count())
            ->description($this->getDescription($diff['value']))
            ->descriptionIcon($diff['icon'])
            ->chart($this->getGraph($diff['value']))
            ->color($diff['color']);
    }

    protected function getCards(): array
    {

        return [
            $this->getStudents(),
            $this->getInst(),
            $this->getContacts(),
        ];
    }
}
