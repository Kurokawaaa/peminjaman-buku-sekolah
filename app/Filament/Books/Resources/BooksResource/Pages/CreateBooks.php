<?php

namespace App\Filament\Books\Resources\BooksResource\Pages;

use App\Filament\Books\Resources\BooksResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooks extends CreateRecord
{
    protected static string $resource = BooksResource::class;
}
