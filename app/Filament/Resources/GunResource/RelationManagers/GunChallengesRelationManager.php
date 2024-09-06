<?php

namespace App\Filament\Resources\GunResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GunChallengesRelationManager extends RelationManager
{
    protected static string $relationship = 'gun_challenges';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('camo_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('challenge')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('came_category')
                    ->options(config('camos.categories')),
                Forms\Components\Select::make('mode')->options([
                    'multiplayer' => 'Multiplayer',
                    'zombies' => 'Zombies',
                ]),
                SpatieMediaLibraryFileUpload::make('camo')->collection('camo')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('camo_name')
            ->columns([
                Tables\Columns\TextColumn::make('camo_name'),
                Tables\Columns\TextColumn::make('camo_category'),
                Tables\Columns\TextColumn::make('category'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
