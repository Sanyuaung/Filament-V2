<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('detail')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->numeric()
                    ->required(),
                TextInput::make('discount')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->toggleable()
                    ->limit(30)
                    ->tooltip(fn($record) : string => $record->name)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('detail')
                    ->toggleable()
                    ->limit(30)
                    ->tooltip(fn($record) : string => $record->detail)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')
                    ->toggleable()
                    ->limit(30)
                    ->tooltip(fn($record) : string => $record->price)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('discount')
                    ->toggleable()
                    ->limit(30)
                    ->tooltip(fn($record) : string => $record->discount)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault : true)
                    ->sortable()
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault : true)
                    ->sortable()
                    ->dateTime(),
            ])
            ->defaultSort('name')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProducts::route('/'),
        ];
    }    
}