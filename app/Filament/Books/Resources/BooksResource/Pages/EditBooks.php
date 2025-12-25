<?php

namespace App\Filament\Books\Resources\BooksResource\Pages;

use App\Filament\Books\Resources\BooksResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBooks extends EditRecord
{
    protected static string $resource = BooksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
