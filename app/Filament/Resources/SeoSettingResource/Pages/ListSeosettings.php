<?php

namespace App\Filament\Resources\SeosettingResource\Pages;

use App\Filament\Resources\SeosettingResource;
use Filament\Resources\Pages\ListRecords;
use App\Models\Seosetting;

class ListSeosettings extends ListRecords
{
    protected static string $resource = SeosettingResource::class;

    public function mount(): void
    {
        // Ambil record pertama atau buat baru jika tidak ada
        $seoSetting = Seosetting::first() ?? Seosetting::create([
            'title' => '',
            'description' => '',
            'keyword' => '',
            'og_image' => '',
        ]);

        // Redirect ke halaman edit langsung
        $this->redirect(SeosettingResource::getUrl('edit', ['record' => $seoSetting]));
    }
}
