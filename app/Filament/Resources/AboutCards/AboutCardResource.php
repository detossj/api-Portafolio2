<?php

namespace App\Filament\Resources\AboutCards;

use App\Filament\Resources\AboutCards\Pages\CreateAboutCard;
use App\Filament\Resources\AboutCards\Pages\EditAboutCard;
use App\Filament\Resources\AboutCards\Pages\ListAboutCards;
use App\Filament\Resources\AboutCards\Schemas\AboutCardForm;
use App\Filament\Resources\AboutCards\Tables\AboutCardsTable;
use App\Models\AboutCard;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutCardResource extends Resource
{
    protected static ?string $model = AboutCard::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return AboutCardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutCardsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAboutCards::route('/'),
            'create' => CreateAboutCard::route('/create'),
            'edit' => EditAboutCard::route('/{record}/edit'),
        ];
    }
}
