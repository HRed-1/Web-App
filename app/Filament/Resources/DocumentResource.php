<?php

namespace App\Filament\Resources;

use App\Models\Document;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\DocumentResource\Pages;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //protected static ?string $recordTitleAttribute = 'Attach';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
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

                    Select::make('type_document_id')
                        ->rules(['exists:type_documents,id'])
                        ->nullable()
                        ->relationship('typeDocument', 'Title')
                        ->searchable()
                        ->placeholder('Type Document')
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

                    TextInput::make('Valide')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Valide')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('Detail')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Detail')
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
                Tables\Columns\TextColumn::make('porteur.Name')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('typeDocument.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Attach')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Valide')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Detail')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('porteur_id')
                    ->relationship('porteur', 'Name')
                    ->indicator('Porteur')
                    ->multiple()
                    ->label('Porteur'),

                SelectFilter::make('type_document_id')
                    ->relationship('typeDocument', 'Title')
                    ->indicator('TypeDocument')
                    ->multiple()
                    ->label('TypeDocument'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'view' => Pages\ViewDocument::route('/{record}'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
