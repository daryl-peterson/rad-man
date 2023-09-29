<?php

namespace App\Observers;

use App\Core\Radius\FreeRadius;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        $radius = new FreeRadius();
        $radius->addUser($customer);
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        $dirty = $customer->getDirty();
        $original = $customer->getOriginal();

        $this->changeUserName($customer, $original, $dirty);
        $this->changePassword($customer, $original, $dirty);
        $this->changeService($customer, $original, $dirty);
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
    }

    private function changeUserName(Customer $customer, array $orginal, array $dirty)
    {
        if (!isset($dirty['username'])) {
            Log::debug('No username change needed');

            return;
        }

        $radius = new FreeRadius();
        $radius->renameUser($orginal['username'], $dirty['username']);
        Log::debug('Changing username',
            [
                'from' => $orginal['username'], 'to' => $dirty['username'],
            ]);
    }

    private function changePassword(Customer $customer, array $orginal, array $dirty)
    {
        if (!isset($dirty['password'])) {
            Log::debug('No password change.');

            return;
        }

        $radius = new FreeRadius();
        $radius->changePassword($customer->username, $customer->password);
        Log::debug('Changing password.',
            [
                'from' => $orginal['password'],
                'to' => $dirty['password'],
            ]);
    }

    private function changeService(Customer $customer, array $orginal, array $dirty)
    {
        if (!isset($dirty['svc_id'])) {
            Log::debug('No service change.');

            return;
        }
        $radius = new FreeRadius();
        $radius->changeService($customer);
        Log::debug('Changing service.');
    }
}
