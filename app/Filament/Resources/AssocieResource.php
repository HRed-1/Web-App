<?php

namespace App\Filament\Resources;

use App\Models\Associe;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\AssocieResource\Pages;

class AssocieResource extends Resource
{
    protected static ?string $model = Associe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'Name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['Name', 'Name_ar', 'Phone', 'CIN' ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Porteur' => $record->Porteur->Name,
            
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        $associe = $record;

        // Get the associated "porteur" record
        $porteur = $associe->porteur;

        // Generate the URL for the "porteur" resource's view page
        $url = PorteurResource::getUrl('view', ['record' => $porteur]);

        return $url;
    }

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('Name')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Name')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Name_ar')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Name Ar')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('CIN')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Cin')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Genre')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Genre')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Phone')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Phone')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Email')
                        ->rules(['email'])
                        ->nullable()
                        ->email()
                        ->placeholder('Email')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date_now')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date Now')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Birth_date')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Birth Date')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('age')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Age')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('commune_id')
                        ->rules(['exists:communes,id'])
                        ->nullable()
                        ->relationship('commune', 'Title')
                        ->searchable()
                        ->placeholder('Commune')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Adresse')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Adresse')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Attach')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Attach')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('Photo')
                        ->rules(['file'])
                        ->nullable()
                        ->image()
                        ->placeholder('Photo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('porteur_id')
                        ->rules(['exists:porteurs,id'])
                        ->nullable()
                        ->relationship('porteur', 'Name')
                        ->searchable()
                        ->placeholder('Porteur')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Formation')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Formation')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Experience')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Experience')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('admin')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('actif')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('poste')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Poste')
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
                Tables\Columns\TextColumn::make('Name')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Name_ar')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('CIN')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Genre')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Phone')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Email')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('date_now')
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('Birth_date')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('age')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('commune.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Adresse')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Attach')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\ImageColumn::make('Photo')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('porteur.Name')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Formation')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Experience')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\IconColumn::make('admin')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('actif')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('poste')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('commune_id')
                    ->relationship('commune', 'Title')
                    ->indicator('Commune')
                    ->multiple()
                    ->label('Commune'),

                SelectFilter::make('porteur_id')
                    ->relationship('porteur', 'Name')
                    ->indicator('Porteur')
                    ->multiple()
                    ->label('Porteur'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssocies::route('/'),
            'create' => Pages\CreateAssocie::route('/create'),
            'view' => Pages\ViewAssocie::route('/{record}'),
            'edit' => Pages\EditAssocie::route('/{record}/edit'),
        ];
    }
}
