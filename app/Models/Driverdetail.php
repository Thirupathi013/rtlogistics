<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Driverdetail extends Model
{

    use LogsActivity;
    protected $fillable = [
        'driver_name',
        'vehicle_number',
        'created_by',
        'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'driverdetail';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
