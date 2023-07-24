<?php

namespace App\Filament\Resources\PorteurResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\AccompagnementPost;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use App\Filament\Resources\AccompagnementPostResource;
use Filament\Resources\RelationManagers\RelationManager;

class AccompagnementPostsRelationManager extends RelationManager
{
    protected static string $relationship = 'accompagnementPosts';

    //protected static ?string $recordTitleAttribute = 'Detail';

    protected static ?string $title = 'Liste des Séances d\'Accompagnement Post-Financement';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([

                Select::make('porteur_id')
                        ->rules(['exists:porteurs,id'])
                        ->default(request()->query('ownerRecord'))
                        ->required()
                        ->relationship('porteur', 'Name')
                        ->searchable()
                        ->preload()

                        ->placeholder('Porteur')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 6,
                        ]),

                Select::make('projet_id')
                    ->rules(['exists:projets,id'])
                    ->relationship('projet', 'Title')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Projet')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),
                

                
                Select::make('type_accomp_post_id')
                    ->rules(['exists:type_accomp_posts,id'])
                    ->relationship('typeAccompPost', 'Title')
                   
                    ->preload()
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
                    ->preload()
                    ->label('Conseiller')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                DateTimePicker::make('Date')
                    ->rules(['date'])
                    ->label('Date')
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
                                    ->directory('Photo-AccompagnementPost')
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
            ->columns([
                Tables\Columns\TextColumn::make('projet.Title')->limit(50),
                Tables\Columns\TextColumn::make('typeAccompPost.Title')->limit(50),
                Tables\Columns\TextColumn::make('Date')->dateTime(),
                Tables\Columns\TextColumn::make('projet')->limit(50),
                
                Tables\Columns\IconColumn::make('check'),
          
           
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()->url(fn ($livewire) => AccompagnementPostResource::getUrl('create', ['ownerRecord' => $livewire->ownerRecord->getKey()]))])
            ->actions([
                Tables\Actions\EditAction::make()->url(fn (Model $record): string => AccompagnementPostResource::getUrl('edit', $record)),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
