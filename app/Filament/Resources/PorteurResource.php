<?php

namespace App\Filament\Resources;

use Closure;
use App\Models\Porteur;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\PorteurResource\Pages;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;

class PorteurResource extends Resource
{
    protected static ?string $model = Porteur::class;

    protected static ?string $recordTitleAttribute = 'Name';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calculator';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationLabel(): string
    {
        return __('Porteur de Projet');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Gestion des Projets');
    }

    public static function getModelLabel(): string
    {
        return __('Porteur de Projet');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Porteurs de Projet');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canGloballySearch(): bool
    {
        return true;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['Name', 'Name_ar', 'ID_RC', 'ID_RCOP' , 'ID_ICE', 'Phone','name_represent', 'name_represent' ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return UserResource::getUrl('edit', ['record' => $record]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Porteur de Projet')->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('Name')
                                ->rules(['max:100', 'string'])
                                ->nullable()
                                ->required()
                                ->Label('Nom du Porteur de Projet')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                    TextInput::make('Name_ar')
                                ->rules(['max:100', 'string'])
                                ->nullable()
                                ->required()
                                ->Label('إسم حامل المشروع')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),
                ])->columns(12),
            ])->collapsible(),

            Section::make('Forme Juridique')->schema([
                Grid::make(['default' => 0])->schema([
                    Select::make('forme_juridique_id')
                                ->rules(['exists:forme_juridiques,id'])
                                ->nullable()
                                ->preload()
                                ->relationship('formeJuridique', 'Title')
                                ->searchable()
                                ->default(1)
                                ->required()
                                ->Label('Forme Juridique')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 7,
                                ]),

                    Toggle::make('Creer')
                                ->rules(['boolean'])
                                ->nullable()
                                ->reactive()
                                ->inline(false)
                                ->Label('Créé')
                                ->Default(false)
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),

                    DatePicker::make('Date_creation')
                                ->rules(['date'])
                                ->required()
                                ->Label('Date Création')
                                ->hidden(fn (Closure $get) => $get('Creer') == 0)
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),

                ])->columns(12),
      

            
                Grid::make(['default' => 0])->schema([                    
                                
                    TextInput::make('ID_RC')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                ->required()
                                ->visible(fn (Closure $get) => $get('forme_juridique_id') == 2)
                                ->unique(
                                    'porteurs',
                                    'ID_RC',
                                    fn(?Model $record) => $record
                                )
                                
                                ->label('Numéro d\'inscription au Registre de Commerce')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 5,
                                ]),

                    TextInput::make('ID_RCOP')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                ->required()
                                ->visible(fn (Closure $get) => $get('forme_juridique_id') == 3)
                                ->unique(
                                    'porteurs',
                                    'ID_RCOP',
                                    fn(?Model $record) => $record
                                )
                                
                                ->label('Numéro d\'inscription au Registre de Coopérative')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 5,
                                ]),

                    TextInput::make('ID_ICE')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                ->unique(
                                    'porteurs',
                                    'ID_ICE',
                                    fn(?Model $record) => $record
                                )
                                
                                ->label('Identifiant Commun de l\'Entreprise')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),
                    TextInput::make('if')
                                ->rules(['max:255', 'string'])
                                ->nullable()                             
                                ->label('Identifiant Fiscal')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),


                ])->columns(12),
            ])->collapsible(),

            Section::make('Activité')->schema([
                Grid::make(['default' => 0])->schema([

                    Select::make('secteur_actvite_id')
                                ->rules(['exists:secteur_actvites,id'])
                                ->nullable()
                                ->preload()
                                ->required()
                                ->Label('Secteur d\'Activité')
                                ->relationship('secteurActvite', 'Title')
                                ->searchable()
                                ->placeholder('Secteur Actvite')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                        RichEditor::make('Activity')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                ->label('Détails d\'activités')
                                ->disableAllToolbarButtons()
                                ->enableToolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'italic',])
                                
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 8,
                                ]),

                ])->columns(12),
            ])->collapsible(),

            Section::make('Coordonées')->schema([
                Grid::make(['default' => 0])->schema([


                    TextInput::make('Phone')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                ->required()
                                ->Label('Numéro de TelePhone')
                                ->mask(fn (TextInput\Mask $mask) => $mask->pattern('+212 0 00 00 00 00'))
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                    TextInput::make('Email')
                                ->rules(['email'])
                                ->nullable()
                                ->email()
                                ->Email('E-mail')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                    TextInput::make('Adresse')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 8,
                                ]),

                    Select::make('commune_id')
                                ->rules(['exists:communes,id'])
                                ->nullable()
                                ->required()
                                ->preload()
                                ->relationship('commune', 'Title')
                                ->searchable()
                                ->Label('Commune')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                ])->columns(12),
            ])->collapsible(),

            Section::make('Membres & Associes')->schema([
                Grid::make(['default' => 0])->schema([

                    TextInput::make('Membre')
                                ->rules(['numeric'])
                                ->nullable()
                                ->numeric()
                                ->visible(fn (Closure $get) => $get('forme_juridique_id') == 3)
                                ->Label('Nombre Total des Membres')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                    TextInput::make('Membre_F')
                                ->rules(['numeric'])
                                ->nullable()
                                ->numeric()
                                ->visible(fn (Closure $get) => $get('forme_juridique_id') == 3)
                                ->Label('Membres Femmes')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),

                    // TextInput::make('Membre_H')
                            //     ->rules(['numeric'])
                            //     ->nullable()
                            //     ->numeric()
                            //     ->placeholder('Membre H')
                            //     ->columnSpan([
                            //         'default' => 12,
                            //         'md' => 12,
                            //         'lg' => 2,
                            //     ]),

                    TextInput::make('Membre_JH')
                                ->rules(['numeric'])
                                ->nullable()
                                ->numeric()
                                ->visible(fn (Closure $get) => $get('forme_juridique_id') == 3)
                                ->Label('Jeunes Hommes')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),   

                    TextInput::make('Membre_JF')
                                ->rules(['numeric'])
                                ->nullable()
                                ->numeric()
                                ->visible(fn (Closure $get) => $get('forme_juridique_id') == 3)
                                ->Label('Jeunes Femmes')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]), 

                ])->columns(12),
            ])->collapsible()->collapsed(),

            Section::make('Infos Administratives')->schema([
                Grid::make(['default' => 0])->schema([


                    TextInput::make('validite')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->label('Validité du Pouvoir')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date_renouv')
                        ->rules(['date'])
                        ->nullable()
                        ->label('Date Renouvellement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('nmbr_conseil')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->label('Membre du conseil')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date_assemble')
                        ->rules(['date'])
                        ->nullable()
                        ->label('Date du Dérnier Assemblé')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                ])->columns(12)->columnSpan(2),

                Card::make()->schema([

                    TextInput::make('name_represent')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->label('Nom du  Représentant Légal'),
                        

                    TextInput::make('cin_represent')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->label('CIN du Représentant Légal'),

                    TextInput::make('phone_represent')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->label('Tel du Représentant Légal'),

                ])->columnSpan(1),
            ])->collapsible()->collapsed()->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('Name')
                    ->label('Porteur de Projet')
                    ->limit(50)
                    ->description(fn (Porteur $record): string => $record->Name_ar),
       
                Tables\Columns\TextColumn::make('formeJuridique.Title')
                    ->label('Forme Juridique')
                    ->limit(50)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('secteurActvite.Title')
                    ->label('Secteur d\'Activité')
                    ->limit(50)
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('Phone')
                    ->label('Tel')
                    ->limit(50)
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('name_represent')
                    ->label('Représentant')
                    ->limit(50)
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('formations_count')->counts('formations')->label('Formations')
                    ->colors([
                        'primary',   
                    ])
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('accompagnements_count')->counts('accompagnements')->label('Accompagnements')
                    ->colors([
                        'primary',
                    ])
          
                    ->sortable()
                    ->toggleable(),
                
            ])
            ->filters([

                SelectFilter::make('forme_juridique_id')
                    ->relationship('formeJuridique', 'Title')
                    ->indicator('FormeJuridique')
                    ->multiple()
                    ->label('FormeJuridique'),

                SelectFilter::make('secteur_actvite_id')
                    ->relationship('secteurActvite', 'Title')
                    ->indicator('SecteurActvite')
                    ->multiple()
                    ->label('SecteurActvite'),

                SelectFilter::make('commune_id')
                    ->relationship('commune', 'Title')
                    ->indicator('Commune')
                    ->multiple()
                    ->label('Commune'),

                
            ]);
    }

    public static function getRelations(): array
    {


        $relations = [
            PorteurResource\RelationManagers\DocumentsRelationManager::class,
            PorteurResource\RelationManagers\ProjetsRelationManager::class,
            PorteurResource\RelationManagers\AccompagnementsRelationManager::class,
            PorteurResource\RelationManagers\AccompagnementPostsRelationManager::class,
            PorteurResource\RelationManagers\AssociesRelationManager::class,
            PorteurResource\RelationManagers\FormationsRelationManager::class,
        ];

        $currentRoute = request()->route();

    
        if ($currentRoute && $currentRoute->getName() === 'filament.resources.porteurs.associe') {
            // Remove other relation managers if it's the edit page
            $relations = [
                PorteurResource\RelationManagers\AssociesRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.porteurs.projet') {
            // Remove other relation managers if it's the edit page
            $relations = [
                PorteurResource\RelationManagers\ProjetsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.porteurs.document') {
            // Remove other relation managers if it's the edit page
            $relations = [
                PorteurResource\RelationManagers\DocumentsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.porteurs.formation') {
            // Remove other relation managers if it's the edit page
            $relations = [
                PorteurResource\RelationManagers\FormationsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.porteurs.accompagnement') {
            // Remove other relation managers if it's the edit page
            $relations = [
                PorteurResource\RelationManagers\AccompagnementsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.porteurs.suivi') {
            // Remove other relation managers if it's the edit page
            $relations = [
                PorteurResource\RelationManagers\AccompagnementPostsRelationManager::class,
            ];
        }

    
        return $relations;
        // return [
        //     PorteurResource\RelationManagers\DocumentsRelationManager::class,
        //     PorteurResource\RelationManagers\ProjetsRelationManager::class,
        //     PorteurResource\RelationManagers\AccompagnementsRelationManager::class,
        //     PorteurResource\RelationManagers\AccompagnementPostsRelationManager::class,
        //     PorteurResource\RelationManagers\AssociesRelationManager::class,
        //     PorteurResource\RelationManagers\FormationsRelationManager::class,
        // ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPorteurs::route('/'),
            'create' => Pages\CreatePorteur::route('/create'),
            'view' => Pages\ViewPorteur::route('/{record}'),
            'edit' => Pages\EditPorteur::route('/{record}/edit'),
            'associe' => Pages\PagePorteur::route('/{record}/associe'),
            'projet' => Pages\PagePorteur::route('/{record}/projet'),
            'document' => Pages\PagePorteur::route('/{record}/document'),
            'formation' => Pages\PagePorteur::route('/{record}/formation'),
            'accompagnement' => Pages\PagePorteur::route('/{record}/accompagnement'),
            'suivi' => Pages\PagePorteur::route('/{record}/suivi'),
            
    
        ];
    }



    public static function sidebar(Model $record): FilamentPageSidebar
    {
        return FilamentPageSidebar::make()
            ->setTitle($record->Name)
            ->setDescription($record->created_at)
            ->setNavigationItems([

                // PageNavigationItem::make(__('Visualiser'))
                //     ->url(function () use ($record) {
                //         return static::getUrl('view', ['record' => $record->id]);  })
                //     ->icon('heroicon-o-collection')
                //     ->isActiveWhen(function () {
                //         return request()->route()->action['as'] == 'filament.resources.porteurs.view';})
                //     ->isHiddenWhen(false)
                //     //->badge($record->Name)
                //     ,
                
                PageNavigationItem::make(__('Modifier le Porteur de Projet'))
                    ->url(function () use ($record) {
                        return static::getUrl('edit', ['record' => $record->id]);})
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.edit';})
                    ->isHiddenWhen(false),

                PageNavigationItem::make(__('Membres & Associes'))
                    ->url(function () use ($record) {
                        return static::getUrl('associe', ['record' => $record->id]);})
                    ->icon('heroicon-o-users')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.associe';})
                    ->isHiddenWhen(false),

                PageNavigationItem::make(__('Projet'))
                    ->url(function () use ($record) {
                        return static::getUrl('projet', ['record' => $record->id]);})
                    ->icon('heroicon-o-users')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.projet';})
                    ->isHiddenWhen(false),

                PageNavigationItem::make(__('liste des Documents'))
                    ->url(function () use ($record) {
                        return static::getUrl('document', ['record' => $record->id]);})
                    ->icon('heroicon-o-users')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.document';})
                    ->isHiddenWhen(false),

                // PageNavigationItem::make(__('User'))
                //     ->url(function () use ($record) {
                //         return static::getUrl('user', ['record' => $record->id]);})
                //     ->icon('heroicon-o-users')
                //     ->isActiveWhen(function () {
                //         return request()->route()->action['as'] == 'filament.resources.porteurs.user';})
                //     ->isHiddenWhen(false),

                PageNavigationItem::make(__('Liste des Formations'))
                    ->url(function () use ($record) {
                        return static::getUrl('formation', ['record' => $record->id]);})
                    ->icon('heroicon-o-users')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.formation';})
                    ->isHiddenWhen(false),

                PageNavigationItem::make(__('Liste des Accompagnements'))
                    ->url(function () use ($record) {
                        return static::getUrl('accompagnement', ['record' => $record->id]);})
                    ->icon('heroicon-o-users')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.accompagnement';})
                    ->isHiddenWhen(false),

                PageNavigationItem::make(__('Liste des Accompagnements Projet'))
                    ->url(function () use ($record) {
                        return static::getUrl('suivi', ['record' => $record->id]);})
                    ->icon('heroicon-o-users')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.porteurs.suivi';})
                        ->isHiddenWhen(FALSE),


                
                
                
                

                
            ]);
    }

}
