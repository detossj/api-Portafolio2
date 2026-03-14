<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('degree')->required()->label('Título / Carrera'),
                TextInput::make('institution')->required()->label('Institución'),
                TextInput::make('status')->required()->label('Estado (Ej: En curso)'),
                TextInput::make('start_date')->required()->label('Año Inicio'),
                TextInput::make('end_date')->required()->label('Año Fin'),
                Textarea::make('description')->required()->label('Descripción')->columnSpanFull(),
            ]);
    }
}