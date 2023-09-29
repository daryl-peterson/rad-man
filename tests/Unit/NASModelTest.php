<?php

namespace Tests\Unit;

use App\Models\NAS;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

/**
 * NAS Model unit tests.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @covers \App\Models\NAS
 */
class NASModelTest extends TestCase
{
    use RefreshDatabase;

    public function testListing(): void
    {
        $result = NAS::listing();
        $this->assertInstanceOf(Collection::class, $result);
    }

    public function testCrud(): void
    {
        $item = NAS::factory()->create();
        $this->assertInstanceOf(NAS::class, $item);

        $item->save();
        $id = $item->id;

        $result = NAS::find($id)->get();
        $this->assertCount(1, $result);

        $item->delete();

        $item = NAS::find($id);
        $this->assertNull($item);
    }

    public function testScopeNasName(): void
    {
        $item = NAS::factory()->create();
        $this->assertInstanceOf(NAS::class, $item);
        $item->save();

        $result = NAS::nasName($item->nasname)->get();
        $this->assertCount(1, $result);
        $this->assertInstanceOf(Collection::class, $result);

        $item = $result->first();
        $this->assertInstanceOf(NAS::class, $item);
    }
}
