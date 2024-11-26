<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Noticias';

    protected static ?string $modelLabel = 'Noticia';

    // protected static ?string $navigationGroup = 'Administração';

    protected static ?string $slug = 'news';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Titulo da Noticia')
                ->description('Insira o titulo da noticia')
                ->schema([TextInput::make('title')->label('Titulo')->placeholder('Insira o titulo da noticia')->required()]),
            Section::make('Conteudo da Noticia')
                ->description('Insira o conteudo da noticia')
                ->schema([Textarea::make('content')->label('Conteudo')->placeholder('Insira o conteudo da noticia')->required()]),
            Section::make('Imagem da Noticia')
                ->description('Insira a imagem da noticia')
                ->schema([FileUpload::make('image')->label('Imagem')->placeholder('Insira a imagem da noticia')->required()]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([TextColumn::make('title')->label('Titulo'), ImageColumn::make('image')->circular()->label('Imagem')])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListNews::route('/'),
            // 'create' => Pages\CreateNews::route('/create'),
            // 'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
