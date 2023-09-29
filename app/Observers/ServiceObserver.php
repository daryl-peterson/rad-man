<?php

namespace App\Observers;

use App\Core\Radius\FreeRadius;
use App\Models\RadUserGroup;
use App\Models\Service;
use Illuminate\Support\Facades\Log;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     */
    public function created(Service $service): void
    {
        $rad = new FreeRadius();
        $rad->addGroupCheck($service->name, 'Simultaneous-Use', ':=', '3');
        Log::debug('Adding Group');
    }

    /**
     * Handle the Service "updated" event.
     */
    public function updated(Service $service): void
    {
        $dirty = $service->getDirty();
        $org = $service->getOriginal();
        Log::debug('', ['dirty' => $dirty, 'org' => $org]);

        if (isset($dirty['name'])) {
            $rad = new FreeRadius();
            $rad->renameGroup($org['name'], $dirty['name']);
        }
    }

    /**
     * Handle the Service "deleting" event.
     */
    public function deleting(Service $service): bool
    {
        $result = !RadUserGroup::hasGroup($service->name);
        Log::debug('Allow delete', ['return' => $result]);

        return $result;
    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        Log::debug('Deleted', ['service' => $service]);
        $rad = new FreeRadius();
        $rad->deleteGroup($service->name);
    }
}
