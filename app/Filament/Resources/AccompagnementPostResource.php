<?php

namespace App\Filament\Resources;

use App\Models\Projet;
use App\Models\Porteur;
use Filament\{Tables, Forms};
use App\Models\AccompagnementPost;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\AccompagnementPostResource\Pages;

class AccompagnementPostResource extends Resource
{
    protected static ?string $model = AccompagnementPost::class;

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
        return __('Accompagnement Post Financement');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Accompagnement');
    }

    public static function getModelLabel(): string
    {
        return __('Accompagnement Post Financement');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Accompagnements Post Financement');
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

                Section::make('Mission')->schema([
                    Grid::make(['default' => 12])->schema([
                            Select::make('porteur_id')
                                ->rules(['exists:porteurs,id'])
                                ->default(request()->query('ownerRecord'))
                                ->nullable()
                                ->relationship('porteur', 'Name')
                                ->searchable()
                                ->preload()
                                ->placeholder('Porteur')
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set)=> $set('projet_id', null))
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                            Select::make('projet_id')
                                ->rules(['exists:projets,id'])
                                ->preload()
                                ->options(function (callable $get){
                                    $porteur = Porteur::find($get('porteur_id'));
                                    if(! $porteur){
                                        return Projet::all()->pluck('Title', 'id');
                                    }
                                    return  $porteur->projets->pluck('Title','id');
                                })
                                ->searchable()
                                ->label('Projet')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),
                            

                            
                            Select::make('type_accomp_post_id')
                                ->rules(['exists:type_accomp_posts,id'])
                                ->relationship('typeAccompPost', 'Title')
                                ->searchable()
                                ->label('Accompagnement')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            Select::make('conseiller_id')
                                ->rules(['exists:conseillers,id'])
                                ->relationship('conseiller', 'Name')
                                ->searchable()
                                ->label('Conseiller')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),

                            DateTimePicker::make('Date')
                                ->rules(['date'])
                                ->placeholder('Date')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),


                            Toggle::make('check')
                                ->rules(['boolean'])
                                ->label('Mission Audit')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),    
                                                
                    ]),
            ])->collapsible(),


                
                Section::make('Compte Rendu')->schema([
                        Grid::make(['default' => 12])->schema([
                            
                                RichEditor::make('diagnostic')
                                    ->rules(['max:255', 'string'])
                                    ->label('Diagnostic')
                                    ->disableAllToolbarButtons()
                                    ->enableToolbarButtons([
                                            'bold',
                                            'bulletList',
                                            'italic',])
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),

                                RichEditor::make('action')
                                    ->rules(['max:255', 'string'])
                                    ->label('Plan d\'Action')
                                    ->disableAllToolbarButtons()
                                    ->enableToolbarButtons([
                                            'bold',
                                            'bulletList',
                                            'italic',])
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
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
                                
                                RichEditor::make('Detail')
                                    ->rules(['max:255', 'string'])
                                    ->label('Observation')
                                    ->disableAllToolbarButtons()
                                    ->enableToolbarButtons([
                                            'bold',
                                            'bulletList',
                                            'italic',])
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),
                        ]),
                ])->collapsible()->collapsed(),

                
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('porteur.Name')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('conseiller.Name')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('programme.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Date')
                    ->toggleable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('Detail')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Attach')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\ImageColumn::make('Photo')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('projet')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('typeAccompPost.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\IconColumn::make('check')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('projet.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('action')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('diagnostic')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('resultat')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('objectif')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('porteur_id')
                    ->relationship('porteur', 'Name')
                    ->indicator('Porteur')
                    ->multiple()
                    ->label('Porteur'),

                SelectFilter::make('conseiller_id')
                    ->relationship('conseiller', 'Name')
                    ->indicator('Conseiller')
                    ->multiple()
                    ->label('Conseiller'),

                SelectFilter::make('programme_id')
                    ->relationship('programme', 'Title')
                    ->indicator('Programme')
                    ->multiple()
                    ->label('Programme'),

                SelectFilter::make('type_accomp_post_id')
                    ->relationship('typeAccompPost', 'Title')
                    ->indicator('TypeAccompPost')
                    ->multiple()
                    ->label('TypeAccompPost'),

                SelectFilter::make('projet_id')
                    ->relationship('projet', 'Title')
                    ->indicator('Projet')
                    ->multiple()
                    ->label('Projet'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccompagnementPosts::route('/'),
            'create' => Pages\CreateAccompagnementPost::route('/create'),
            'view' => Pages\ViewAccompagnementPost::route('/{record}'),
            'edit' => Pages\EditAccompagnementPost::route('/{record}/edit'),
        ];
    }
}
