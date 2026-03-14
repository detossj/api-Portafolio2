<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->label('Título del Proyecto'),

                Select::make('category')
                    ->options([
                        'Web' => 'Desarrollo Web',
                        'Mobile' => 'Móvil',
                        'Backend' => 'Backend / API',
                    ])
                    ->required()
                    ->label('Categoría'),

                FileUpload::make('image')
                    ->image()
                    ->directory('projects')
                    ->label('Imagen de Portada'),

                TagsInput::make('technologies')
                    ->required()
                    ->label('Tecnologías (Enter para agregar)'),

                TextInput::make('github_url')
                    ->url()
                    ->label('Link GitHub'),

                TextInput::make('liveUrl')
                    ->url()
                    ->label('Link Web (Opcional)'),

                Toggle::make('featured')
                    ->label('¿Destacar proyecto?')
                    ->default(false),

                Textarea::make('description')
                    ->required()
                    ->label('Descripción completa')
                    ->columnSpanFull(),
            ]);
    }
}