<?php

namespace App\Filament\Resources\PorteurResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';



    protected static ?string $title = 'Liste des Documents';


    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                Select::make('type_document_id')
                    ->rules(['exists:type_documents,id'])
                    ->relationship('typeDocument', 'Title')
                    ->searchable()
                    ->label('Document')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 5,
                    ]),

                FileUpload::make('Attach')
                    ->directory('Document-Porteur-Projet')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(2048)
                    // ->multiple()
                    // ->maxFiles(5)
                    // ->enableReordering()
                    ->enableOpen()
                    ->enableDownload()
                    ->label('Pièce Jointe')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 5,
                    ]),

                Toggle::make('Valide')
                    ->inlineLabel(false)
                    ->label('Valide')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 2,
                    ]),

                RichEditor::make('Detail')
                    ->rules(['max:255', 'string'])
                    ->label('Observations')
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
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('typeDocument.Title')->label('Document')->limit(50),
                //Tables\Columns\TextColumn::make('Attach')->limit(10),
                Tables\Columns\IconColumn::make('Valide')->boolean(),
            
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
