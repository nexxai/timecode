<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackedTZ extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'timezone'];

    public function getCurrentTime()
    {
        $serverTimeZone = readlink('/etc/localtime');
        $serverTimeZone = substr($serverTimeZone, strpos($serverTimeZone, '/zoneinfo/') + 10);

        return (now()->tz($serverTimeZone))->tz($this->timezone)->format('g:i A');
    }
}
