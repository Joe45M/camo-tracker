<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GunChallengeResource\Pages;
use App\Filament\Resources\GunChallengeResource\RelationManagers;
use App\Models\GunChallenge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GunChallengeResource extends Resource
{
    protected static ?string $model = GunChallenge::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('challenge')
                    ->required(),
                Forms\Components\TextInput::make('camo_name')
                    ->required(),
                Forms\Components\TextInput::make('came_category')
                    ->required(),
                Forms\Components\TextInput::make('gun_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('challenge')
                    ->searchable(),
                Tables\Columns\TextColumn::make('camo_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('came_category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gun_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListGunChallenges::route('/'),
            'create' => Pages\CreateGunChallenge::route('/create'),
            'edit' => Pages\EditGunChallenge::route('/{record}/edit'),
        ];
    }
}
