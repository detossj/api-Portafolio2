<?php

namespace App\Filament\Resources\AboutCards\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AboutCardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')->required()->label('Icono (Ej: User, Code)'),
                TextInput::make('title')->required()->label('Título (Ej: Perfil)'),
                TextInput::make('text')->required()->label('Texto descriptivo'),
                TextInput::make('order')->numeric()->default(0)->label('Orden'),
            ]);
    }
}