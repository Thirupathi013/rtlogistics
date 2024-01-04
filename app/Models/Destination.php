<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Destination extends Model
{

    use LogsActivity;
    protected $fillable = [
        'destination_name',
        'main_station',
        'short_name',
        'created_by',
        'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'destination';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
