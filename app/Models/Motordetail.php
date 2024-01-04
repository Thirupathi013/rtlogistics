<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Motordetail extends Model
{

    use LogsActivity;
    protected $fillable = [

        'report_number',
        'report_date',
        'arrival_date',
        'booking_staion',
        'destination',
        'truck_number',
        'lorry_hire',
        'total_lr',
        'total_article',
        'total_topay',
        'total_paid',
        'total_weight',
        'created_by',
        'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'Motordetail';
    protected static $logOnlyDirty = true;

    public function bookingstation() {
        return $this->belongsTo('App\Models\Bookingstation','booking_station');
    }
    public function destination_list() {
        return $this->belongsTo('App\Models\Destination','destination');
    }
    public function driver() {
        return $this->belongsTo('App\Models\Driverdetail','truck_number');
    }

    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
