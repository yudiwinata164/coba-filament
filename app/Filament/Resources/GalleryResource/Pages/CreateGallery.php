<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Gallery;
use Illuminate\Support\Arr;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getRedirectUrl(): string
    {
        return GalleryResource::getUrl(); // Redirect ke index
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function handleRecordCreation(array $data): Gallery
    {
        // Tangani array dari upload multiple
        foreach ($data['images'] as $imagePath) {
            Gallery::create([
                'image_name' => $imagePath,
            ]);
        }

        // Kita tidak membuat 1 record utama, jadi return dummy model untuk menghindari error
        return new Gallery(); // dummy return
    }
}
