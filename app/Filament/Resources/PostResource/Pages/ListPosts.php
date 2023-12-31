<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
    protected function isTablePaginationEnabled(): bool 
    {
        return true;
    } 
    protected function getTableRecordsPerPageSelectOptions(): array 
    {
        return [25, 50];
    }
    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}