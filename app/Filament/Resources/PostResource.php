<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PostResource extends Resource
{
    protected static ?int $navigationSort = 0;

    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post')->schema([
                    Forms\Components\TextInput::make('title')->required(),

                    Forms\Components\MarkdownEditor::make('text')
                        ->fileAttachmentsDisk('uploads')
                        ->fileAttachmentsVisibility('public')
                        ->enableToolbarButtons([
                            'attachFiles',
                        ])
                        ->required(),
                    Forms\Components\DateTimePicker::make('publish_date')
                        ->withoutSeconds()
                        ->nullable(),
                    SpatieTagsInput::make('tags'),
                ]),
                Forms\Components\Section::make('Meta')->schema([
                    Forms\Components\TextInput::make('external_url'),
                    Forms\Components\Checkbox::make('published'),
                    Forms\Components\Checkbox::make('original_content'),
                    Forms\Components\Checkbox::make('send_automated_tweet'),

                    Forms\Components\Select::make('submitted_by_user_id')
                        ->relationship('submittedByUser', 'name'),
                    Forms\Components\TextInput::make('author_twitter_handle'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->limit(50)->sortable(),
                Tables\Columns\TextColumn::make('publish_date')->sortable()->dateTime(),
                Tables\Columns\BooleanColumn::make('published'),
                Tables\Columns\BooleanColumn::make('original_content')->label('Original'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->url(fn (Post $record) => $record->adminPreviewUrl(), shouldOpenInNewTab: true),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('publish_date', 'desc');
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
