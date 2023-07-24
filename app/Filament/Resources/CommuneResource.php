<?php

namespace App\Filament\Resources;

use App\Models\Commune;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\CommuneResource\Pages;

class CommuneResource extends Resource
{
    protected static ?string $model = Commune::class;

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
        return __('Projets par Communes');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Indicateurs');
    }

    public static function getModelLabel(): string
    {
        return __('Commune');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Communes');
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
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('Title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Title_ar')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title Ar')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('Title')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Title_ar')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {

        $relations = [
            CommuneResource\RelationManagers\PorteursRelationManager::class,
            CommuneResource\RelationManagers\AssociesRelationManager::class,
            CommuneResource\RelationManagers\ProjetsRelationManager::class,
        ];

        $currentRoute = request()->route();

    
        if ($currentRoute && $currentRoute->getName() === 'filament.resources.communes.edit') {
            // Remove other relation managers if it's the edit page
            $relations = [
                CommuneResource\RelationManagers\PorteursRelationManager::class,
            ];
        }
        elseif ($currentRoute && $currentRoute->getName() === 'filament.resources.communes.view') {
            // Remove other relation managers if it's the edit page
            $relations = [
                CommuneResource\RelationManagers\ProjetsRelationManager::class,
            ];
        }
    
        return $relations;

    //     $relations = [];

    // $currentRoute = request()->route();
    // if ($currentRoute && $currentRoute->getName() === 'filament.resources.communes.edit') {
    //     $relations[] = $relations[] = CommuneResource\RelationManagers\PorteursRelationManager::class;
    // } else {
    //     $relations = [
    //         CommuneResource\RelationManagers\PorteursRelationManager::class,
    //         CommuneResource\RelationManagers\AssociesRelationManager::class,
    //         CommuneResource\RelationManagers\ProjetsRelationManager::class,
    //     ];
    // }

    // return $relations;




        // return [
        //     CommuneResource\RelationManagers\PorteursRelationManager::class,
        //     CommuneResource\RelationManagers\AssociesRelationManager::class,
        //     CommuneResource\RelationManagers\ProjetsRelationManager::class,
        // ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommunes::route('/'),
            'create' => Pages\CreateCommune::route('/create'),
            'view' => Pages\ViewCommune::route('/{record}'),
            'edit' => Pages\EditCommune::route('/{record}/edit'),
        ];
    }
}
