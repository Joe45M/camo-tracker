<?php

namespace App\Filament\Resources\GunChallengeResource\Pages;

use App\Filament\Resources\GunChallengeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGunChallenges extends ListRecords
{
    protected static string $resource = GunChallengeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
