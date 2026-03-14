<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Nombre de la Habilidad'),

                TextInput::make('icon')
                    ->label('Icono (Nombre de la clase o SVG)')
                    ->placeholder('Ej: fa-brands fa-laravel'),

                Select::make('category')
                    ->options([
                        'Frontend' => 'Frontend',
                        'Backend' => 'Backend',
                        'Mobile' => 'Mobile',
                        'Herramientas' => 'Herramientas',
                        'Soft Skills' => 'Soft Skills',
                    ])
                    ->required()
                    ->label('Categoría'),
            ]);
    }
}