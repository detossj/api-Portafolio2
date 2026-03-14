<?php

namespace App\Filament\Resources\GithubRepos\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class GithubReposTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('language')
                    ->label('Lenguaje')
                    ->badge()
                    ->color('info'),

                TextColumn::make('stars')
                    ->label('Estrellas')
                    ->icon('heroicon-m-star')
                    ->sortable(),

                TextColumn::make('url')
                    ->label('Enlace')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
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