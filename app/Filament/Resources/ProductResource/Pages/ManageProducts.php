<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProducts extends ManageRecords
{
    protected static string $resource = ProductResource::class;
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
            Actions\CreateAction::make(),
        ];
    }
}