<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Locality;
use App\Models\Institutes;
use App\Enums\AccountStatus;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InstituteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\InstituteResource\RelationManagers;
use App\Filament\Resources\InstituteResource\Widgets\InstituteRegistrationChart;

class InstituteResource extends Resource
{
    protected static ?string $model = Institutes::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static  ?string $navigationGroup = 'Institutes';

    protected static  ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic details')
                ->schema([                        
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('city_id')
                        ->relationship('city', 'name')
                        ->required(),
                    Forms\Components\Select::make('locality_id')
                        ->relationship('locality', 'name')
                        ->required(),
                    Forms\Components\TextInput::make('address')
                        ->required()
                        ->maxLength(255),
                ])
                ->collapsed(false)
                ->collapsible()
                ->columns(2),
                Section::make('Contact details')
                ->schema([                        
                    Forms\Components\TextInput::make('phone')
                        ->required()
                        ->tel(),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->email(),
                ])
                ->collapsed(false)
                ->collapsible()
                ->columns(2),
                Section::make('Status')
                ->schema([                        
                    Forms\Components\Select::make('status')                        
                        ->required()
                        ->options(AccountStatus::getUserAccountType()),
                    Forms\Components\Select::make('leads_status')
                        ->options(Institutes::enum('leads_status')->filament())
                        ->required(),
                    Forms\Components\Select::make('bookings_status')
                        ->options(Institutes::enum('bookings_status')->filament())
                        ->required(),
                ])
                ->collapsed(false)
                ->collapsible()
                ->columns(3),
                Section::make('Images')
                ->schema([                        
                    SpatieMediaLibraryFileUpload::make('photos')
                        ->multiple()
                        ->collection('institute_images')
                        ->rules('required'),
                ])
                ->collapsed(false)
                ->collapsible()
                ->columns(1),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Inst Name')
                    ->description(function(Institutes $record) {
                        return $record->email;
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->label('City')
                    ->description(function(Institutes $record) {
                        return 'Locality: ' . Locality::find($record->locality_id)->name;
                    })
                    ->sortable()
                    ->searchable(),
                BadgeColumn::make('status')->enum(
                        AccountStatus::values(inverse: true)
                    )
                        ->label('Status')
                        ->colors(AccountStatus::colors())
                        ->icons(AccountStatus::icons())
                        ->sortable(),
                BadgeColumn::make('leads_status')->enum(
                        Institutes::enum('leads_status')->filament()
                    )
                        ->label('Leads')
                        ->colors(Institutes::enum('leads_status')->filamentColors())
                        ->sortable(),
                BadgeColumn::make('bookings_status')->enum(
                        Institutes::enum('bookings_status')->filament()
                    )
                        ->label('Bookings')
                        ->colors(Institutes::enum('bookings_status')->filamentColors())
                        ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter by institute status')
                    ->options(AccountStatus::values(inverse: true)),
                SelectFilter::make('leads_status')
                    ->label('Filter by leads status')
                    ->options(Institutes::enum('leads_status')->filament()),
                SelectFilter::make('bookings_status')
                    ->label('Filter by bookings status')
                    ->options(Institutes::enum('bookings_status')->filament()),
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
            'index' => Pages\ListInstitutes::route('/'),
            'create' => Pages\CreateInstitute::route('/create'),
            'edit' => Pages\EditInstitute::route('/{record}/edit'),
        ];
    }    

    public static function getWidgets(): array
    {
        return [
            InstituteRegistrationChart::class,
        ];
    }
}
