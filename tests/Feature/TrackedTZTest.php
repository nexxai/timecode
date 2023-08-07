<?php

use App\Models\TrackedTZ;
use Carbon\Carbon;

it('has a name', function () {
    $tz = TrackedTZ::factory()->create(['name' => 'Bob']);

    $this->assertIsString($tz->name);
    $this->assertEquals('Bob', $tz->name);
});

it('has a timezone', function () {
    $tz = TrackedTZ::factory()->create(['timezone' => 'America/Edmonton']);

    $this->assertIsString($tz->timezone);
    $this->assertEquals('America/Edmonton', $tz->timezone);
});

it('knows its own timezone', function () {
    $tracked = TrackedTZ::factory()->create(['timezone' => 'America/Winnipeg']);

    // Hour = 22
    $now = Carbon::create(2023, 9, 5, 22, 26, 11, 'America/Edmonton');
    Carbon::setTestNow($now);

    // Hour = 23
    $expected = Carbon::create(2023, 9, 5, 23, 26, 11, 'America/Winnipeg');
    $this->assertEquals($expected, $tracked->getCurrentTime());
});
