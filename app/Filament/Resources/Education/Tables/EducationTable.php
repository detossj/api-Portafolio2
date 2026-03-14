<?php

namespace App\Filament\Resources\Education\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class EducationTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('degree')
                    ->label('Título / Carrera')
                    ->searchable(),
                    
                TextColumn::make('institution')
                    ->label('Institución'),
                    
                TextColumn::make('start_date')
                    ->label('Año Inicio'),
                    
                TextColumn::make('status')
                    ->label('Estado')
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