<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuentaResource\Pages;
use App\Filament\Resources\CuentaResource\RelationManagers;
use App\Models\Cuenta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class CuentaResource extends Resource
{
    protected static ?string $model = Cuenta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Contas';

    protected static ?string $modelLabel = 'Contas';

    // protected static ?string $navigationGroup = 'Administração';

    protected static ?string $slug = 'contas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Usuario')
                ->description('Informações do usuário')
                ->schema([
                Forms\Components\TextInput::make('cuenta')
                    ->label('Conta'),
                Forms\Components\TextInput::make('nombre')
                    ->label('Nome'),
                Forms\Components\TextInput::make('apellido')
                    ->label('Sobrenome'),
                Forms\Components\TextInput::make('email')
                    ->label('E-mail'),
                Forms\Components\TextInput::make('idioma')
                    ->label('Idioma'),
                Forms\Components\TextInput::make('pais')
                    ->label('País'),
                ]),
                Section::make('Segurança')
                ->description('Informações de segurança')
                ->schema([
                Forms\Components\TextInput::make('contraseña')
                ->label('Senha')
                ->required()
                ->dehydrateStateUsing(fn($state) => $state)
                ->afterStateHydrated(fn($set, $record) => $set('contraseña', $record?->contraseña ?? '')),              
                Forms\Components\TextInput::make('pregunta')
                    ->label('Pergunta'),
                Forms\Components\TextInput::make('respuesta')
                    ->label('Resposta'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cuenta')
                ->label('Conta')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nombre')
                ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('apellido')
                ->label('Sobrenome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                ->label('E-mail')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('idioma')
                ->label('Idioma')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pais')
                ->label('País')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCuentas::route('/'),
            // 'create' => Pages\CreateCuenta::route('/create'),
            // 'edit' => Pages\EditCuenta::route('/{record}/edit'),
        ];
    }
}
