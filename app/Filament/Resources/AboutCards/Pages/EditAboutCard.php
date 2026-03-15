<?php

namespace App\Filament\Resources\AboutCards\Pages;

use App\Filament\Resources\AboutCards\AboutCardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAboutCard extends EditRecord
{
    protected static string $resource = AboutCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
