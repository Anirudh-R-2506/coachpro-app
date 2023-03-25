<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\City;
use App\Models\User;
use Filament\Tables;
use App\Enums\Timing;
use App\Enums\Session;
use App\Enums\UserRole;
use App\Models\Locality;
use App\Enums\AccountStatus;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Widgets\UserRegistrationChart;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static  ?string $navigationGroup = 'Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('Basic details')
                    ->schema([                        
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('password', Hash::make($state)) : null),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Hidden::make('password')
                    ])
                    ->collapsed(false)
                    ->collapsible()
                    ->columns(2),
                    Section::make('Student details')
                    ->schema([
                        Forms\Components\Select::make('education')
                            ->options([
                                'school' => 'School',
                                'ug' => 'Undergraduate',
                                'pg' => 'Postgraduate',
                            ]),
                        Forms\Components\Select::make('class')
                            ->options([
                                '8' => '8th',
                                '9' => '9th',
                                '10' => '10th',
                                '11' => '11th',
                                '12' => '12th',
                            ])
                            ->when('education', 'school'),
                        Forms\Components\Select::make('year_of_passing')
                            ->options([
                                '2023' => '2023',
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                            ])
                            ->when('education', 'school'),
                    ])
                    ->collapsed(false)
                    ->collapsible()
                    ->columns(2),
                    Section::make('Student preferences')
                    ->schema([
                        /* Forms\Components\Select::make('city')
                            ->options(City::all()->pluck('name', 'id'))
                            ->afterStateUpdated(
                                fn ($state, callable $set) => $set('locality', null)
                            ),
                        Forms\Components\Select::make('locality'), */
                        Forms\Components\Select::make('session')
                            ->options(Session::values($inverse = true)),
                        Forms\Components\Select::make('timing')
                            ->options(Timing::values($inverse = true)),
                    ])
                    ->collapsed(false)
                    ->collapsible()
                    ->columns(2),
                    Section::make('Account details')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->hidden()
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('password', bcrypt('password')) : null),                        
                        Forms\Components\Select::make('role')
                            ->required()
                            /* ->afterStateUpdated(
                                fn ($state, callable $set) => $state == UserRole::INSTITUTE ? $set('institute_id', null) : $set('institute_id', 'hidden')
                            ) */
                            ->options(UserRole::getLabels()),
                        Forms\Components\Select::make('account_status')
                            ->required()
                            ->options(AccountStatus::getUserAccountType()),
                        Forms\Components\Select::make('institute_id')
                            ->relationship('institute', 'name')
                            /* ->hidden(
                                fn (Closure $get): bool => $get('role') == UserRole::INSTITUTE
                            ) */,
                        Forms\Components\TextInput::make('admin_remarks')
                            ->maxLength(255),
                    ])
                    ->collapsed(false)
                    ->collapsible()
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('User Name')
                    ->description(function(User $record) {
                        return $record->email;
                    })
                    ->searchable(),
                BadgeColumn::make('account_status')->enum(
                            AccountStatus::values(inverse: true)
                        )
                            ->label('Account Status')
                            ->description('Unverified, Verified, Flagged, Banned')
                            ->colors(AccountStatus::colors())
                            ->icons(AccountStatus::icons())
                            ->sortable(),


                BadgeColumn::make('role')->enum(
                                UserRole::values(inverse: true)
                            )
                                ->label('Account Type')
                                ->colors(UserRole::colors())
                                ->icons(UserRole::icons())
                                ->sortable(),

                Tables\Columns\TextColumn::make('phone')->label('Phone Number')->searchable(),                
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Filter by account type')
                    ->options(UserRole::values(inverse: true)),

                SelectFilter::make('account_status')
                    ->label('Filter by account status')
                    ->options(AccountStatus::values(inverse: true)),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    

    public static function getWidgets(): array
    {
        return [
            UserRegistrationChart::class,
        ];
    }
}
