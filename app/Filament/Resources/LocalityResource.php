<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\Locality;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LocalityResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LocalityResource\RelationManagers;

class LocalityResource extends Resource
{
    protected static ?string $model = Locality::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static  ?string $navigationGroup = 'Admin';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Card::make()
                ->schema([                        
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('city_id')
                        ->required()
                        ->relationship('city', 'name'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('city.name')->sortable()->searchable(),
            ])
            ->filters([
                SelectFilter::make('city_id')
                    ->label('Filter by city')
                    ->options(City::all()->pluck('name', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLocalities::route('/'),
            'create' => Pages\CreateLocality::route('/create'),
            'edit' => Pages\EditLocality::route('/{record}/edit'),
        ];
    }    
}
