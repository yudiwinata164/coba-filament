<?php

namespace App\Filament\Resources\SeosettingResource\Pages;

use App\Filament\Resources\SeosettingResource;
use Filament\Resources\Pages\EditRecord;

class EditSeoSingleSetting extends EditRecord
{
    protected static string $resource = SeosettingResource::class;

    public function mount(string|int $record = 1): void
    {
        // Pastikan ID = 1
        parent::mount(1);
    }
}
