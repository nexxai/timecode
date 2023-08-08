<?php

namespace App\Models;

use Carbon\CarbonTimeZone;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Orbit\Concerns\Orbital;

class TrackedTZ extends Model
{
    use HasFactory;
    use Orbital;

    public static string $driver = 'json';

    public static function schema(Blueprint $table): void
    {
        $table->id();
        $table->string('name');
        $table->string('timezone');
        $table->boolean('show_in_menubar')->default(false);
        $table->integer('display_order')->default(0);
    }

    protected $fillable = ['name', 'timezone', 'show_in_menubar'];

    public static function getOrdered()
    {
        return TrackedTZ::displayOrder()->get();
    }

    public function getCurrentTime()
    {
        $carbon = new Carbon();
        return $carbon->now($this->serverTimeZone())
            ->tz($this->timezone)
            ->format('g:i A');
    }

    public function getTimeDifference(): string
    {
        $local = Carbon::now($this->serverTimeZone())
            ->roundMinutes(5);
        $remote = Carbon::now($this->timezone)
            ->shiftTimezone($this->serverTimeZone())
            ->roundMinutes(5);

        $minuteDiff = $local->diffInMinutes($remote, false);
        $hourDiff = $minuteDiff / 60 * 60 / 60;

        if ($hourDiff > 0) {
            return '(+' . $hourDiff . 'h)';
        } else if ($hourDiff < 0) {
            return '(' . $hourDiff . 'h)';
        }

        return '';
    }

    public function getShortTimeZoneName(): string
    {
        $tz = CarbonTimeZone::create($this->timezone);
        return str($tz->getAbbreviatedName(true))->upper();
    }

    /**
     * @return string
     */
    public function serverTimeZone(): string
    {
        $serverTimeZone = readlink('/etc/localtime');
        $serverTimeZone = substr($serverTimeZone, strpos($serverTimeZone, '/zoneinfo/') + 10);

        return $serverTimeZone;
    }

    public function scopeDisplayOrder(Builder $query): void
    {
        $query->orderBy('display_order');
    }

    public function scopeInMenubar(Builder $query): void
    {
        $query->where('show_in_menubar', true);
    }
}
