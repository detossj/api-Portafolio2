<?php

namespace App\Filament\Resources\NavItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NavItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')->required()->label('Etiqueta (Ej: Inicio)'),
                TextInput::make('href')->required()->label('Enlace (Ej: #hero)'),
                TextInput::make('order')->numeric()->default(0)->label('Orden de aparición'),
            ]);
    }
}