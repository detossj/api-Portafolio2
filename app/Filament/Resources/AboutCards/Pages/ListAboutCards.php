<?php

namespace App\Filament\Resources\AboutCards\Pages;

use App\Filament\Resources\AboutCards\AboutCardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutCards extends ListRecords
{
    protected static string $resource = AboutCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
