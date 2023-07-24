<?php

namespace App\Filament\Resources;

use App\Models\Projet;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\ProjetResource\Pages;
use App\Models\ActifPoste;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;

class ProjetResource extends Resource
{
    protected static ?string $model = Projet::class;

    protected static ?string $recordTitleAttribute = 'Title';

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
        return __('Projet');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Gestion des Projets');
    }

    public static function getModelLabel(): string
    {
        return __('Projet');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Projets');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canGloballySearch(): bool
    {
        return true;
    }


    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                        Card::make()->schema([
                            Grid::make(['default' => 12])->schema([

                                        TextInput::make('Title')
                                            ->rules(['max:255', 'string'])
                    
                                            ->required()
                                            ->Label('Intitulé du Projet')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 6,
                                            ]),

                                        TextInput::make('Title_ar')
                                            ->rules(['max:255', 'string'])
                                            ->nullable()
                                            ->required()
                                            ->Label('إسم المشروع')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 6,
                                            ]),

                                        Select::make('porteur_id')
                                            ->rules(['exists:porteurs,id'])
                              
                                            ->default(request()->query('ownerRecord'))
                                            ->relationship('porteur', 'Name')
                                            ->disabled()
                                            
                                            ->Label('Nom du Porteur de Projet')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 6,
                                            ]),

                                        Select::make('porteur_id')
                                            ->rules(['exists:porteurs,id'])
                                   
                                            ->default(request()->query('ownerRecord'))
                                            ->relationship('porteur', 'Name_ar')
                                            ->disabled()
                                            
                                            ->Label('إسم حامل المشروع')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 6,
                                            ]),
                                //...
                            ]),

                            
                        ])->columnSpan(['default' => 12,'md' => 12,'lg' => 12,]),


                        Card::make()->schema([
                            Grid::make(['default' => 0])->schema([

                                Select::make('programme_id')
                                    ->rules(['exists:programmes,id'])
                                 
                                    ->relationship('programme', 'Title')
                                    
                                    ->placeholder('Programme'),

                                Select::make('phase_id')
                                    ->rules(['exists:phases,id'])
                                    ->nullable()
                                    ->relationship('phase', 'Title')
                                    
                                    ->placeholder('Phase'),


                                        
                            ]),

                            
                        ])->columnSpan(['default' => 12,'md' => 12,'lg' => 4,]),

                        Card::make()->schema([
                            Grid::make(['default' => 12])->schema([


                                Select::make('secteur_actvite_id')
                                    ->rules(['exists:secteur_actvites,id'])
                               
                                    ->relationship('secteurActvite', 'Title')
                                    ->required()
                                    ->placeholder('Secteur Actvite')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 6,
                                    ]),

                                Select::make('commune_id')
                                    ->rules(['exists:communes,id'])
                                 
                                    ->relationship('commune', 'Title')
                                    ->required()
                                    ->placeholder('Commune')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 6,
                                    ]),

                                TextInput::make('adresse')
                                    ->rules(['max:255', 'string'])
                                    ->nullable()
                                    ->placeholder('Adresse')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),

                                


                                        
                            ]),

                            
                        ])->columnSpan(['default' => 12,'md' => 12,'lg' => 8,]),

                        Card::make()->schema([
                            Grid::make(['default' => 12])->schema([

                            Tabs::make('Description du Projet')
                                ->tabs([
                                    Tabs\Tab::make('Descirpiotn du Projet')
                                        ->schema([

                                            RichEditor::make('Detail')
                                                ->rules(['max:255', 'string'])
                                                ->nullable()
                                                ->label('Descirpiotn du Projet')
                                                ->disableAllToolbarButtons()
                                                ->enableToolbarButtons([
                                                        'bold',
                                                        'bulletList',
                                                        'italic',])
                                                ->columnSpan(['default' => 12,'md' => 12,'lg' => 12,]),

                                            RichEditor::make('motiv_obj')
                                                ->rules(['max:255', 'string'])
                                                ->nullable()
                                                ->disableAllToolbarButtons()
                                                ->enableToolbarButtons([
                                                        'bold',
                                                        'bulletList',
                                                        'italic',])
                                                ->label('Motivations & Objectis du Projet')
                                                ->columnSpan(['default' => 12,'md' => 12,'lg' => 12,]),

                                            
                                            // ...
                                        ]),
                                    Tabs\Tab::make('وصف المشروع')
                                        ->schema([

                                            RichEditor::make('Detail_ar')
                                                ->rules(['max:255', 'string'])
                                                ->nullable()
                                                ->label('وصف المشروع')
                                                ->disableAllToolbarButtons()
                                                ->enableToolbarButtons([
                                                        'bold',
                                                        'bulletList',
                                                        'italic',])
                                                ->columnSpan(['default' => 12,'md' => 12,'lg' => 12,]),

                                            RichEditor::make('moti_obj_ar')
                                                ->rules(['max:255', 'string'])
                                                ->nullable()
                                                ->label('مبررات وأهداف المشروع')
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

                                        
                                            // ...
                                    ]),
                                    Tabs\Tab::make('Investissement et Financement')
                                        ->schema([

                                            Card::make()->schema([   
                                            
                                            
                                                            TextInput::make('Cout')
                                                                ->rules(['numeric'])
                                                                ->nullable()
                                                                ->numeric()
                                                                ->label('Cout Global du Projet')
                                                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                                                ->columnSpan([
                                                                    'default' => 12,
                                                                    'md' => 12,
                                                                    'lg' => 12,
                                                                ]),

                                                            Select::make('composante')
                                                                
                                                                ->options(ActifPoste::all()->pluck('title' , 'id'))
                                                                ->nullable()
                                                                ->label('Composantes')
                                                                ->multiple()
                                                                ->preload()
                                                                ->columnSpan([
                                                                    'default' => 12,
                                                                    'md' => 12,
                                                                    'lg' => 12,
                                                                ]),
                                        
                                        
                                            ])->columnSpan(['default' => 12,'md' => 12,'lg' => 6,]),
                                            Card::make()->schema([
                                                            TextInput::make('Apport')
                                                                ->rules(['numeric'])
                                                                ->nullable()
                                                                ->numeric()
                                                                ->label('Apport Personnel')
                                                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                                                ->columnSpan([
                                                                    'default' => 12,
                                                                    'md' => 12,
                                                                    'lg' => 12,
                                                                ]),
                                        
                                                            TextInput::make('Subvention')
                                                                ->rules(['numeric'])
                                                                ->nullable()
                                                                ->numeric()
                                                                ->label('Subvention')
                                                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                                                ->columnSpan([
                                                                    'default' => 12,
                                                                    'md' => 12,
                                                                    'lg' => 12,
                                                                ]),
                                        
                                                            TextInput::make('Emprunt')
                                                                ->rules(['numeric'])
                                                                ->nullable()
                                                                ->numeric()
                                                                ->label('Emprunt')
                                                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                                                ->columnSpan([
                                                                    'default' => 12,
                                                                    'md' => 12,
                                                                    'lg' => 12,
                                                                ]),
                                            ])->columnSpan(['default' => 12,'md' => 12,'lg' => 6,])

                                            // ...
                                    ])->columns(12),
                                    Tabs\Tab::make('Infos Projet ')
                                        ->schema([

                                                Toggle::make('dispo_local')
                                                    ->rules(['boolean'])
                                                    ->required()
                                                    ->label('Local Disponible')
                                                    ->columnSpan([
                                                        'default' => 12,
                                                        'md' => 12,
                                                        'lg' => 4,
                                                    ]),
                
                                                Toggle::make('dispo_apport')
                                                    ->rules(['boolean'])
                                                    ->required()
                                                    ->label('Apport Disponible')
                                                    ->columnSpan([
                                                        'default' => 12,
                                                        'md' => 12,
                                                        'lg' => 4,
                                                    ]),
                
                                                
                                                Toggle::make('innov')
                                                    ->rules(['boolean'])
                                                    ->required()
                                                    ->label('Projet Innovant')
                                                    ->columnSpan([
                                                        'default' => 12,
                                                        'md' => 12,
                                                        'lg' => 4,
                                                    ]),
                
                
                                                TextInput::make('poste')
                                                    ->rules(['numeric'])
                                                    ->nullable()
                                                    ->numeric()
                                                    ->label('Postes à créer')
                                                    ->columnSpan([
                                                        'default' => 12,
                                                        'md' => 12,
                                                        'lg' => 3,
                                                    ]),
                                    ])->columns(12),
                

                                    
                                ])->columnSpan(['default' => 12,'md' => 12,'lg' => 12,]),
                                

                                
                                

                                

                                

                                
                                

                                                            ]),
                        ])->columnSpan(['default' => 12,'md' => 12,'lg' => 12,]),
        
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('porteur.Name')
                    ->toggleable()
                    ->label('Porteur du Projet')
                    ->limit(50),
                Tables\Columns\TextColumn::make('Title')
                    ->toggleable()
                    ->label('Intitulé du Projet')
                    ->limit(50)
                    ->description(fn (Projet $record): string => $record->Title_ar),
                
                Tables\Columns\TextColumn::make('commune.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('secteurActvite.Title')
                    ->toggleable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('Cout')
                    ->toggleable()
                    ->label('Cout du Projet'),
                Tables\Columns\TextColumn::make('Apport')
                    ->toggleable()
                    ->label('Apport'),
                Tables\Columns\TextColumn::make('Subvention')
                    ->toggleable()
                    ,
                Tables\Columns\TextColumn::make('Emprunt')
                    ->toggleable()
                    ,
                
                
                Tables\Columns\IconColumn::make('dispo_local')
                    ->toggleable()
                    ->label('Local')
                    ->boolean()
                    ->boolean(),
                Tables\Columns\IconColumn::make('dispo_apport')
                    ->toggleable()
                    ->label('Apport')
                    ->boolean()
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('innov')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('poste')
                    ->toggleable()
                    ->label('Postes à Créer')
                    ,
                Tables\Columns\TextColumn::make('programme.Title')
                    ->toggleable()
                    ->label('Programme')
                    ->limit(50),
                Tables\Columns\TextColumn::make('phase.Title')
                    ->toggleable()
                    ->label('Phase')
                    ->limit(50),
            ])
            ->filters([

                SelectFilter::make('porteur_id')
                    ->relationship('porteur', 'Name')
                    ->indicator('Porteur')
                    ->multiple()
                    ->label('Porteur'),

                SelectFilter::make('programme_id')
                    ->relationship('programme', 'Title')
                    ->indicator('Programme')
                    ->multiple()
                    ->label('Programme'),

                SelectFilter::make('phase_id')
                    ->relationship('phase', 'Title')
                    ->indicator('Phase')
                    ->multiple()
                    ->label('Phase'),

                SelectFilter::make('commune_id')
                    ->relationship('commune', 'Title')
                    ->indicator('Commune')
                    ->multiple()
                    ->label('Commune'),

                SelectFilter::make('secteur_actvite_id')
                    ->relationship('secteurActvite', 'Title')
                    ->indicator('SecteurActvite')
                    ->multiple()
                    ->label('SecteurActvite'),
            ]);
    }

    public static function getRelations(): array
    {
        $relations = [
            ProjetResource\RelationManagers\DevisRelationManager::class,
            ProjetResource\RelationManagers\OffresRelationManager::class,
            ProjetResource\RelationManagers\ClientsRelationManager::class,
            ProjetResource\RelationManagers\FournisseursRelationManager::class,
            ProjetResource\RelationManagers\ConcurrentsRelationManager::class,
            ProjetResource\RelationManagers\StrategiesRelationManager::class,
            ProjetResource\RelationManagers\ApportsRelationManager::class,
            ProjetResource\RelationManagers\SubventionsRelationManager::class,
            ProjetResource\RelationManagers\EmpruntsRelationManager::class,
            ProjetResource\RelationManagers\MoyenFonciersRelationManager::class,
            ProjetResource\RelationManagers\InvestissementsRelationManager::class,
            ProjetResource\RelationManagers\MoyenHumainsRelationManager::class,
            ProjetResource\RelationManagers\ChargesRelationManager::class,
            ProjetResource\RelationManagers\AllChiffreAffairesRelationManager::class,
            ProjetResource\RelationManagers\FacturesRelationManager::class,
            ProjetResource\RelationManagers\MaterielsRelationManager::class,
            ProjetResource\RelationManagers\SwotsRelationManager::class,
            ProjetResource\RelationManagers\AccompagnementPostsRelationManager::class,
        ];

        $currentRoute = request()->route();

    
        if ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.offre') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\OffresRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.strategie') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\StrategiesRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.swot') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\SwotsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.client') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\ClientsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.fournisseur') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\FournisseursRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.concurrent') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\ConcurrentsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.foncier') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\MoyenFonciersRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.technique') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\InvestissementsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.humain') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\MoyenHumainsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.apport') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\ApportsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.emprunt') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\EmpruntsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.subvention') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\SubventionsRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.CA') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\AllChiffreAffairesRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.projets.charge') {
            // Remove other relation managers if it's the edit page
            $relations = [
                ProjetResource\RelationManagers\ChargesRelationManager::class,
            ];
        }
       

    
        return $relations;
        
        
        
        
        // return [
        //     ProjetResource\RelationManagers\DevisRelationManager::class,
        //     ProjetResource\RelationManagers\OffresRelationManager::class,
        //     ProjetResource\RelationManagers\ClientsRelationManager::class,
        //     ProjetResource\RelationManagers\FournisseursRelationManager::class,
        //     ProjetResource\RelationManagers\ConcurrentsRelationManager::class,
        //     ProjetResource\RelationManagers\StrategiesRelationManager::class,
        //     ProjetResource\RelationManagers\ApportsRelationManager::class,
        //     ProjetResource\RelationManagers\SubventionsRelationManager::class,
        //     ProjetResource\RelationManagers\EmpruntsRelationManager::class,
        //     ProjetResource\RelationManagers\MoyenFonciersRelationManager::class,
        //     ProjetResource\RelationManagers\InvestissementsRelationManager::class,
        //     ProjetResource\RelationManagers\MoyenHumainsRelationManager::class,
        //     ProjetResource\RelationManagers\ChargesRelationManager::class,
        //     ProjetResource\RelationManagers\AllChiffreAffairesRelationManager::class,
        //     ProjetResource\RelationManagers\FacturesRelationManager::class,
        //     ProjetResource\RelationManagers\MaterielsRelationManager::class,
        //     ProjetResource\RelationManagers\SwotsRelationManager::class,
        //     ProjetResource\RelationManagers\AccompagnementPostsRelationManager::class,
        // ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjets::route('/'),
            'create' => Pages\CreateProjet::route('/create'),
            //'view' => Pages\ViewProjet::route('/{record}'),
            'edit' => Pages\EditProjet::route('/{record}/edit'),
            'offre' => Pages\OffreProjet::route('/{record}/offre'),
            'strategie' => Pages\StrategyProjet::route('/{record}/startegie'),
            'swot' => Pages\SwotProjet::route('/{record}/swot'),
            'client' => Pages\ClientProjet::route('/{record}/client'),
            'fournisseur' => Pages\FournisseurProjet::route('/{record}/fournisseur'),
            'concurrent' => Pages\ConcurrentProjet::route('/{record}/concurrent'),
            'foncier' => Pages\FonicierProjet::route('/{record}/foncier'),
            'technique' => Pages\InvestissementProjet::route('/{record}/technique'),
            'humain' => Pages\RHProjet::route('/{record}/humain'),
            'apport' => Pages\ApportProjet::route('/{record}/apport'),
            'emprunt' => Pages\EmpruntProjet::route('/{record}/emprunt'),
            'subvention' => Pages\SubventionProjet::route('/{record}/subvention'),
            'CA' => Pages\CAProjet::route('/{record}/CA'),
            'charge' => Pages\ChargeProjet::route('/{record}/charge'),
            'presentation' => Pages\PresentationProjet::route('/{record}/presentation'),
            
            
        ];
    }


    public static function sidebar(Model $record): FilamentPageSidebar
    {
        return FilamentPageSidebar::make()
            ->setTitle($record->Title)
            ->setDescription($record->Title_ar)
            ->setNavigationItems([

                // PageNavigationItem::make(__('Visualiser'))
                //     ->url(function () use ($record) {
                //         return static::getUrl('view', ['record' => $record->id]);  })
                //     ->icon('heroicon-o-collection')
                //     ->isActiveWhen(function () {
                //         return request()->route()->action['as'] == 'filament.resources.projets.view';})
                //     ->isHiddenWhen(false)
                //     //->badge($record->Name)
                //     ,
                
                PageNavigationItem::make(__('Modifier le Projet'))
                    ->url(function () use ($record) {
                        return static::getUrl('edit', ['record' => $record->id]);})
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.projets.edit';})
                    ->isHiddenWhen(false),

                PageNavigationItem::make(__('Produits & Services'))
                    ->url(function () use ($record) {
                        return static::getUrl('offre', ['record' => $record->id]);  })
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        $routeNames = [
                            'filament.resources.projets.offre',
                            'filament.resources.projets.strategie',
                            'filament.resources.projets.swot',
                            
                        ];
        
                        return in_array(request()->route()->action['as'], $routeNames);
                    })
                    
                    ->isHiddenWhen(false)
                    //->badge($record->Name)
                    ,

                PageNavigationItem::make(__('Etude de Marché'))
                    ->url(function () use ($record) {
                        return static::getUrl('client', ['record' => $record->id]);  })
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        $routeNames = [
                            'filament.resources.projets.client',
                            'filament.resources.projets.fournisseur',
                            'filament.resources.projets.concurrent',
                            
                        ];
        
                        return in_array(request()->route()->action['as'], $routeNames);
                    })
                    
                    ->isHiddenWhen(false)
                    //->badge($record->Name)
                    ,
                
                PageNavigationItem::make(__('Programme d\'Investissement'))
                    ->url(function () use ($record) {
                        return static::getUrl('foncier', ['record' => $record->id]);  })
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        $routeNames = [
                            'filament.resources.projets.foncier',
                            'filament.resources.projets.technique',
                            'filament.resources.projets.humain',
                            
                        ];
        
                        return in_array(request()->route()->action['as'], $routeNames);
                    })
                    
                    ->isHiddenWhen(false)
                    //->badge($record->Name)
                    ,

                PageNavigationItem::make(__('Plan de Financement'))
                    ->url(function () use ($record) {
                        return static::getUrl('apport', ['record' => $record->id]);  })
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        $routeNames = [
                            'filament.resources.projets.apport',
                            'filament.resources.projets.emprunt',
                            'filament.resources.projets.subvention',
                            
                        ];
        
                        return in_array(request()->route()->action['as'], $routeNames);
                    })
                    
                    ->isHiddenWhen(false)
                    //->badge($record->Name)
                    ,

                PageNavigationItem::make(__('Prévisionnel Financier'))
                    ->url(function () use ($record) {
                        return static::getUrl('CA', ['record' => $record->id]);  })
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        $routeNames = [
                            'filament.resources.projets.CA',
                            'filament.resources.projets.charge',
                            
                        ];
        
                        return in_array(request()->route()->action['as'], $routeNames);
                    })
                    
                    ->isHiddenWhen(false)
                    //->badge($record->Name)
                    ,

                

                PageNavigationItem::make(__('Presentation'))
                    ->url(function () use ($record) {
                        return static::getUrl('presentation', ['record' => $record->id]);})
                    ->icon('heroicon-o-collection')
                    ->isActiveWhen(function () {
                        return request()->route()->action['as'] == 'filament.resources.projets.presentation';})
                    ->isHiddenWhen(false),
                
                

                

                                
            ]);
    }
}
