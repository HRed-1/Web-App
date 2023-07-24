<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use App\Models\Formation;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\FormationResource\Pages;

class FormationResource extends Resource
{
    protected static ?string $model = Formation::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calculator';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationLabel(): string
    {
        return __('Formations Planifiées');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Formation');
    }

    public static function getModelLabel(): string
    {
        return __('Formation');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Formations');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canGloballySearch(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([

                Section::make('Formation')->schema([
                    Grid::make(['default' => 12])->schema([

                            Select::make('module_id')
                                ->rules(['exists:modules,id'])
                                ->nullable()
                                ->relationship('module', 'Title')
                                ->searchable()
                                ->preload()
                                ->label('Module de Formation')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                            Select::make('conseiller_id')
                                ->rules(['exists:conseillers,id'])
                                ->nullable()
                                ->relationship('conseiller', 'Name')
                                ->searchable()
                                ->preload()
                                ->label('Formateur')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                                                
                    ]),
                ])->collapsible(),


                
                Section::make('Programme')->schema([
                        Grid::make(['default' => 12])->schema([

                            DateTimePicker::make('Debut')
                                ->rules(['date'])
                                ->nullable()
                                ->placeholder('Debut')
                                ->default(function () {
                                    return Carbon::now(); 
                                })
                                ->withoutSeconds()
                                ->displayFormat('l d F Y à H:i')
    
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),
        
                            DateTimePicker::make('Fin')
                                ->rules(['date'])
                                ->nullable()
                                ->placeholder('Fin')
                                ->default(function () {
                                    return Carbon::now()->addHours(4); 
                                })
                                ->withoutSeconds()
                                ->displayFormat('l d F Y à H:i')

                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),
                            TextInput::make('Lieu')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                ->label('Lieu de la formation')
                                ->default('PlateForme des Jeunes Guercif')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),
                            
                                
                                                    
                        ]),
                ])->collapsible()->collapsed(),

                Section::make('Attachements')->schema([
                        Grid::make(['default' => 12])->schema([
                                FileUpload::make('Attach')
                                    ->directory('Document-Formation')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(2048)
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->enableReordering()
                                    ->enableOpen()
                                    ->enableDownload()
                                    ->label('Pièces Jointes')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 6,
                                    ]),
        
                                FileUpload::make('Photo')
                                    ->rules(['file'])
                                    ->image()
                                    ->maxSize(2048)
                                    ->multiple()
                                    ->maxFiles(10)
                                    ->enableReordering()
                                    ->enableOpen()
                                    ->enableDownload()
                                    ->placeholder('Photo')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 6,
                                    ]),
                                
                                
                        ]),
                ])->collapsible()->collapsed(),
                            Select::make('programme_id')
                                ->rules(['exists:programmes,id'])
                                ->nullable()
                                ->relationship('programme', 'Title')
                                ->searchable()
                                ->preload()
                                ->label('Programme')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),
                
            ]),
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('module.Title')
                    ->toggleable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('Debut')
                    ->toggleable()
                    ->dateTime(),
                    Tables\Columns\BadgeColumn::make('porteurs_count')->counts('porteurs')->label('Participants')
                    ->colors([
                        'primary',
                       
                    ]),
               
                
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('module_id')
                    ->relationship('module', 'Title')
                    ->indicator('Module')
                    ->multiple()
                    ->label('Module'),

                SelectFilter::make('conseiller_id')
                    ->relationship('conseiller', 'Name')
                    ->indicator('Conseiller')
                    ->multiple()
                    ->label('Conseiller'),

                
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FormationResource\RelationManagers\PorteursRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormations::route('/'),
            'create' => Pages\CreateFormation::route('/create'),
            'view' => Pages\ViewFormation::route('/{record}'),
            'edit' => Pages\EditFormation::route('/{record}/edit'),
        ];
    }
}
