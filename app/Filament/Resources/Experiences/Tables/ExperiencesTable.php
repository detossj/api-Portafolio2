<?php

namespace App\Filament\Resources\Experiences\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Cargo')
                    ->searchable(),
                    
                TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable(),
                    
                TextColumn::make('start_date')
                    ->label('Inicio'),
                    
                TextColumn::make('end_date')
                    ->label('Fin')
                    ->default('Actualidad') 
                    ->badge(), 
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