<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enums\UserRole;
use App\Enums\AccountStatus;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
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
                Forms\Components\Card::make()
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
                            ->maxLength(255),
                        Forms\Components\Hidden::make('password')
                    ])
                    ->columns(2),
                    Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('role')
                            ->required()
                            ->options(UserRole::getLabels()),
                        Forms\Components\Select::make('account_status')
                            ->required()
                            ->options(AccountStatus::getUserAccountType()),
                        Forms\Components\Textarea::make('admin_remarks')
                            ->maxLength(65535),
                    ])
                    ->columns(2)
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
