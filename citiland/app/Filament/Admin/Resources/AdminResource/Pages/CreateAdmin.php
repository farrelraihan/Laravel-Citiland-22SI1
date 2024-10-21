<?php

namespace App\Filament\Admin\Resources\AdminResource\Pages;

use App\Filament\Admin\Resources\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;


class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;   


    protected function getRedirectUrl(): string
    {
        // Get the latest Admin record
        $latestAdmin = Admin::latest('kodeAdmin')->first();

        // If an Admin record is found, redirect to its edit page
        if ($latestAdmin) {
            return $this->getResource()::getUrl('edit', ['record' => $latestAdmin]);
        }

        // If no Admin records are found, redirect to the Admin list page
        return $this->getResource()::getUrl('index');
    }
}
