<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Examinations;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExaminationsResource\Pages;
use App\Filament\Resources\ExaminationsResource\RelationManagers;

class ExaminationsResource extends Resource
{
    protected static ?string $model = Examinations::class;

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
                        Forms\Components\TextInput::make('board')
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options(Examinations::enum('status')->filament()),
                    ])
                    ->columns(2),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                BadgeColumn::make('status')->enum(
                    Examinations::enum('status')->filament()
                )
                    ->label('Status')
                    ->description('Active, Inactive')
                    ->colors(Examinations::enum('status')->filamentColors())
                    ->icons(Examinations::enum('status')->filamentIcons())
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter by account status')
                    ->options(Examinations::enum('status')->filament()),
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
            'index' => Pages\ListExaminations::route('/'),
            'create' => Pages\CreateExaminations::route('/create'),
            'edit' => Pages\EditExaminations::route('/{record}/edit'),
        ];
    }    
}
