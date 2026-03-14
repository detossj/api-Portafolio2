<?php

namespace App\Filament\Resources\GithubRepos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;

class GithubRepoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->label('Nombre del Repositorio'),
                TextInput::make('url')->required()->url()->label('URL de GitHub'),
                TextInput::make('language')->label('Lenguaje Principal (Ej: PHP, Kotlin)'),
                TextInput::make('stars')->numeric()->label('Estrellas (Opcional)')->default(0),
                Textarea::make('description')->label('Descripción corta')->columnSpanFull(),
            ]);
    }
}