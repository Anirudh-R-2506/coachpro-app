<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Courses;
use App\Models\Examinations;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CourseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CourseResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CourseResource extends Resource
{
    protected static ?string $model = Courses::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static  ?string $navigationGroup = 'Institutes';

    protected static  ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Demo Lecture')
                ->schema([                        
                    SpatieMediaLibraryFileUpload::make('video')                        
                        ->collection('course_video')
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
                    ->sortable()
                    ->searchable()
                    ->description(function(Courses $record) {
                        return 'Institute: ' . $record->institute->name;
                    }),
                Tables\Columns\TextColumn::make('fees')
                    ->sortable()
                    ->label('Fees (INR)')
                    ->description(function(Courses $record) {
                        return 'Duration: ' . \Carbon\Carbon::parse( $record->start_date )->diffInMonths( $record->end_date ) . ' months';
                    }),
                Tables\Columns\TextColumn::make('video_url')
                    ->label('Video URL')
                    ->tooltip('Click to open video in current tab')                    
                    ->url(fn (Courses $record) => $record->video_url),
                BadgeColumn::make('status')->enum(
                        Courses::enum('status')->filament()
                    )
                        ->label('Status')
                        ->colors(Courses::enum('status')->filamentColors())
                        ->icons(Courses::enum('status')->filamentIcons())
                        ->sortable(),                    
                Tables\Columns\TextColumn::make('examination.name')
                    ->sortable()
                    ->searchable()
                    ->label('Examination/Skill')
                    ->description(function(Courses $record) {
                        $category = Examinations::find($record->examination_id);
                        $category = $category->board != null ? $category->board : 'N/A';
                        return 'Board: ' . $category;
                    }),
                                       
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter by status')
                    ->options(Courses::enum('status')->filament()),            
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
            'index' => Pages\ListCourses::route('/'),
            /* 'create' => Pages\CreateCourse::route('/create'), */
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }    
}
