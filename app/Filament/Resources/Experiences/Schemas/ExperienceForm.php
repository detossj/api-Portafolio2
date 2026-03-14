<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->label('Cargo'),
                TextInput::make('company')->required()->label('Empresa'),
                TextInput::make('start_date')->required()->label('Fecha Inicio'),
                TextInput::make('end_date')->label('Fecha Fin'),
                TagsInput::make('technologies')->label('Tecnologías usadas')->placeholder('Escribe una y presiona Enter'),
                Textarea::make('description')->required()->label('Descripción')->columnSpanFull(),
            ]);
    }
}