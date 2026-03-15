<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Components\Section; 
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sección Inicio (Hero)')->schema([
                    TextInput::make('hero_greeting')->required()->label('Saludo (Ej: Hola, soy)'),
                    TextInput::make('name')->required()->label('Nombre Completo'),
                    TextInput::make('hero_title')->required()->label('Título (Ej: Desarrollador...)'),
                    Textarea::make('hero_bio')->required()->label('Biografía Corta')->columnSpanFull(),
                ])->columns(2),

                Section::make('Sobre Mí y Footer')->schema([
                    TextInput::make('about_avatar')->url()->required()->label('URL de tu foto de perfil'),
                    Textarea::make('about_description')->required()->label('Descripción principal'),
                    TextInput::make('footer_short_bio')->required()->label('Frase del pie de página'),
                ])->columns(1),

                Section::make('Contacto')->schema([
                    TextInput::make('contact_email')->email()->required()->label('Email'),
                    TextInput::make('contact_phone')->required()->label('Teléfono'),
                    TextInput::make('contact_location')->required()->label('Ciudad, País'),
                    TextInput::make('contact_github')->url()->required()->label('Link de GitHub'),
                    TextInput::make('contact_linkedin')->url()->label('Link de LinkedIn (Opcional)'),
                ])->columns(2),

                Section::make('Paleta de Colores (Tema)')->schema([
                    ColorPicker::make('theme_colors.primary')->label('Primario (Acentos)'),
                    ColorPicker::make('theme_colors.secondary')->label('Secundario'),
                    ColorPicker::make('theme_colors.background')->label('Fondo Base'),
                    ColorPicker::make('theme_colors.surface')->label('Fondo Tarjetas'),
                    ColorPicker::make('theme_colors.surfaceAlt')->label('Fondo Alternativo'),
                    ColorPicker::make('theme_colors.border')->label('Color de Bordes'),
                    ColorPicker::make('theme_colors.textPrimary')->label('Texto Principal'),
                    ColorPicker::make('theme_colors.textSecondary')->label('Texto Secundario'),
                    ColorPicker::make('theme_colors.textMuted')->label('Texto Apagado'),
                ])->columns(3),
            ]);
    }
}