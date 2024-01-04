<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Lrdetail extends Model
{

    use LogsActivity;
    protected $fillable = [
        'lr_number',
        'lr_date',
        'truck_number',
        'report_number',
        'report_date',
        'arrive_number',
        'arrive_date',
        'user_id',
        'booking_station_id',
        'destination_id',
        'article',
        'enter only any number',
        'description_id',
        'consignee_id',
        'pvt_mark',
        'weight',
        'lr_pay_status',
        'topay_value',
        'status',
        'created_by',


    ];
    protected static $logFillable = true;
    protected static $logName = 'lrdetail';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }
    public function bookingstation() {
        return $this->belongsTo('App\Models\Bookingstation','booking_station_id');
    }
    public function destination() {
        return $this->belongsTo('App\Models\Destination','destination_id');
    }
    public function description() {
        return $this->belongsTo('App\Models\Description','description_id');
    }
    public function partydetail() {
        return $this->belongsTo('App\Models\Partydetail','consignee_id');
    }

}
