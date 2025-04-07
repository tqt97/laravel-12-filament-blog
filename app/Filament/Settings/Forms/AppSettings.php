<?php

namespace App\Filament\Settings\Forms;

use Filament\Forms\Components\Tabs\Tab;

class AppSettings
{
    public static function getTab(): Tab
    {
        return Tab::make('app_settings')
            ->label(__('Custom'))
            ->icon('heroicon-o-computer-desktop')
            ->schema(self::getFields())
            ->columns()
            ->statePath('app_settings')
            ->visible(true);
    }

    public static function getFields(): array
    {
        return [];
    }

    public static function getSortOrder(): int
    {
        return 1;
    }
}
