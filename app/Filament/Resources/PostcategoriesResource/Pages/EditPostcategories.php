<?php

namespace App\Filament\Resources\PostcategoriesResource\Pages;

use App\Filament\Resources\PostcategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostcategories extends EditRecord
{
    protected static string $resource = PostcategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
