<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GunResource\Pages;
use App\Filament\Resources\GunResource\RelationManagers;
use App\Models\Gun;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GunResource extends Resource
{
    protected static ?string $model = Gun::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Select::make('category')->options([
                    'ar' => 'Assault Rifle',
                    'smg' => 'SMG',
                    'shotgun' => 'Shotgun',
                    'lmg' => 'LMG',
                    'marksman' => 'Marksman Rifle',
                    'sniper' => 'Sniper Rifle',
                    'pistol' => 'Pistol',
                    'launcher' => 'Launcher'
                ]),
                Forms\Components\Textarea::make('description')->required()->default('Assault rifle released at launch.'),
                Forms\Components\TextInput::make('released_in')->default('Base game'),
                SpatieMediaLibraryFileUpload::make('gun')->collection('gun'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('category'),
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
            RelationManagers\GunChallengesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuns::route('/'),
            'create' => Pages\CreateGun::route('/create'),
            'edit' => Pages\EditGun::route('/{record}/edit'),
        ];
    }
}
