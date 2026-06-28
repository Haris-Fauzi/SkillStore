<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\ViewRecord;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $this->record->load('screenshots');

        return $data;
    }
}