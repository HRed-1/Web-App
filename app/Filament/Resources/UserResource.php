<?php

namespace App\Filament\Resources;

use Hash;
use App\Models\User;
use Livewire\Component;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\UserResource\Pages;
use Filament\Resources\{Form, Table, Resource};
use XliteDev\FilamentImpersonate\Tables\Actions\ImpersonateAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user-circle';
    }

    public static function getNavigationSort(): ?int
    {
        return -11;
    }

    public static function getNavigationLabel(): string
    {
        return __('Utilisateurs');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Filament Shield');
    }

    public static function getModelLabel(): string
    {
        return __('Utilisateur');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Utilisateurs');
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
                    TextInput::make('name')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Name')
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
                            'lg' => 6,
                        ]),

                    TextInput::make('email')
                        ->rules(['email'])
                        ->required()
                        ->unique(
                            'users',
                            'email',
                            fn(?Model $record) => $record
                        )
                        ->email()
                        ->placeholder('Email')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 6,
                        ]),

                    Toggle::make('Is_admin')
                        ->rules(['boolean'])
                        ->nullable()
                        ->label('Admin')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 3,
                        ]),

                    Toggle::make('Active')
                        ->rules(['boolean'])
                        ->nullable()
                        ->label('Actif')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 3,
                        ]),

                    TextInput::make('password')
                        ->required()
                        ->password()
                        ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        ->required(
                            fn(Component $livewire) => $livewire instanceof
                                Pages\CreateUser
                        )
                        ->visible(fn (\Livewire\Component $livewire): bool => $livewire instanceof Pages\CreateUser)

                        ->placeholder('Password')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 6,
                        ]),
                    Forms\Components\Select::make('roles')
                        ->multiple()
                        ->preload()
                        ->relationship('roles','name')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 6,
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
                Tables\Columns\TextColumn::make('name')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Phone')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('email')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\IconColumn::make('Is_admin')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('Active')
                    ->toggleable()
                    ->boolean(),
            ])
            ->filters([DateRangeFilter::make('created_at')])
            ->actions([
                ImpersonateAction::make(), // <--- 
                // ...
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // UserResource\RelationManagers\PorteursRelationManager::class,
            // UserResource\RelationManagers\ConseillersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
