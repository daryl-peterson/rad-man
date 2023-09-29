<?php

namespace App\Core\Radius;

use App\Core\Exceptions\InvalidOperator;
use App\Models\Customer;
use App\Models\RadAcct;
use App\Models\RadCheck;
use App\Models\RadGroupCheck;
use App\Models\RadGroupReply;
use App\Models\RadUserGroup;
use App\Models\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class description.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class FreeRadius
{
    public const VALID_OPS = [
        ':=',
        '==',
        '+=',
        '!=',
        '>',
        '>=',
        '<',
        '<=',
        '=*',
        '!*',
    ];

    /**
     * Add record to RadGroupCheck.
     */
    public function addGroupCheck(
        string $groupName,
        string $attribute,
        string $op,
        string $value
    ): bool {
        if (!in_array($op, self::VALID_OPS)) {
            throw new InvalidOperator("Invalid operator given: $op");
        }
        $attributes = [
            'groupname' => $groupName,
            'attribute' => $attribute,
            'op' => $op,
            'value' => $value,
        ];

        try {
            RadGroupCheck::firstOrCreate($attributes);

            return true;
        } catch (\Throwable $th) {
            $msg = $th->getMessage();
            Log::error($msg, ['file' => $th->getFile()]);
            throw new \Exception($msg);
        }

        return false;
    }

    /**
     * Rename radius group.
     */
    public function renameGroup(string $old, string $new): void
    {
        RadGroupCheck::where('groupname', '=', $old)->chunkById(200, function ($list) use ($new) {
            try {
                DB::beginTransaction();

                foreach ($list as $object) {
                    $object->groupname = $new;
                    $object->save();
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $msg = $th->getMessage();
                Log::error($msg, ['file' => $th->getFile()]);
                throw new \Exception($msg);
            }
        });

        RadGroupReply::where('groupname', '=', $old)->chunkById(200, function ($list) use ($new) {
            try {
                DB::beginTransaction();

                foreach ($list as $object) {
                    $object->groupname = $new;
                    $object->save();
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $msg = $th->getMessage();
                Log::error($msg, ['file' => $th->getFile()]);
                throw new \Exception($msg);
            }
        });

        RadUserGroup::where('groupname', '=', $old)->chunkById(200, function ($list) use ($new) {
            try {
                DB::beginTransaction();

                foreach ($list as $object) {
                    $object->groupname = $new;
                    $object->save();
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $msg = $th->getMessage();
                Log::error($msg, ['file' => $th->getFile()]);
                throw new \Exception($msg);
            }
        });
    }

    /**
     * Delete group from RadGroupCheck, RadGroupReply. If no users belong to that group.
     */
    public function deleteGroup(string $groupName): void
    {
        if (RadUserGroup::hasGroup($groupName)) {
            return;
        }

        $list = RadGroupCheck::where('groupname', '=', $groupName)->get();
        foreach ($list as $item) {
            $obj = RadGroupCheck::find($item->id);
            $obj->delete();
        }

        $list = RadGroupReply::where('groupname', '=', $groupName)->get();
        foreach ($list as $item) {
            $obj = RadGroupReply::find($item->id);
            $obj->delete();
        }
    }

    private function addUserToGroup(
        string $username,
        string $groupName,
        int $priority = 1
    ): bool {
        $attributes = [
            'username' => $username,
            'groupname' => $groupName,
            'priority' => $priority,
        ];

        try {
            RadUserGroup::firstOrCreate($attributes);

            return true;
        } catch (\Throwable $th) {
            $msg = $th->getMessage();
            Log::error($msg, ['file' => $th->getFile()]);
            throw new \Exception($msg);
        }

        return false;
    }

    public function addUser(Customer $customer, array $attributes = [])
    {
        $service = Service::where('id', '=', $customer->svc_id)->first();
        $this->addUserToGroup($customer->username, $service->name);

        $attributes[] = [
            'username' => $customer->username,
            'attribute' => 'Cleartext-Password',
            'op' => ':=',
            'value' => $customer->password,
        ];

        foreach ($attributes as $params) {
            if (!$this->hasUserCheckFields($params)) {
                continue;
            }

            $params = (object) $params;
            $this->addUserToCheck($params->username, $params->value, $params->attribute, $params->op);
        }
    }

    public function changePassword(string $username, string $password)
    {
        $obj = RadCheck::where('username', '=', $username)
                ->where('attribute', 'Cleartext-Password')
                ->first();

        $obj->value = $password;
        $obj->save();

        $obj = RadCheck::where('username', '=', $username)
                ->where('attribute', 'Cleartext-Password')
                ->first();
        Log::debug('', ['object' => $obj]);
    }

    public function changeService(Customer $customer)
    {
        $service = $customer->service();

        $obj = RadUserGroup::where('username', '=', $customer->username)->first();
        $obj->delete();

        $this->addUserToGroup($customer->username, $service->name);
    }

    private function hasUserCheckFields(array $data)
    {
        $requirements = ['username', 'attribute', 'op', 'value'];
        foreach ($requirements as $required) {
            if (!isset($data[$required])) {
                return false;
            }
        }

        return true;
    }

    private function addUserToCheck(
        string $username,
        string $value,
        string $attribute = 'Cleartext-Password',
        string $op = ':='
    ) {
        $attributes = [
            'username' => $username,
            'attribute' => $attribute,
            'op' => $op,
            'value' => $value,
        ];

        try {
            RadCheck::firstOrCreate($attributes);

            return true;
        } catch (\Throwable $th) {
            $msg = $th->getMessage();
            Log::error($msg, ['file' => $th->getFile()]);
            throw new \Exception($msg);
        }

        return false;
    }

    public function renameUser(string $old, string $new)
    {
        RadCheck::where('username', '=', $old)->chunkById(200, function ($list) use ($new) {
            try {
                DB::beginTransaction();

                foreach ($list as $object) {
                    $object->username = $new;
                    $object->save();
                }

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $msg = $th->getMessage();
                Log::error($msg, ['file' => $th->getFile()]);
                throw new \Exception($msg);
            }
        });

        RadAcct::where('username', '=', $old)->chunkById(1000, function (Collection $list) use ($new) {
            DB::beginTransaction();
            foreach ($list as $acct) {
                DB::table('radacct')
                    ->where('radacctid', $acct->radacctid)
                    ->update(['username' => $new]);
            }
            DB::commit();
        }, 'radacctid');
    }
}
