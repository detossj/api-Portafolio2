<?php

namespace App\Filament\Resources\NavItems\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class NavItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('Orden')->sortable(),
                TextColumn::make('label')->label('Etiqueta')->searchable(),
                TextColumn::make('href')->label('Enlace'),
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