<?php

namespace App\Filament\Resources\AboutCards\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class AboutCardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('Orden')->sortable(),
                TextColumn::make('icon')->label('Icono')->badge()->color('info'),
                TextColumn::make('title')->label('Título'),
                TextColumn::make('text')->label('Texto')->limit(30),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}