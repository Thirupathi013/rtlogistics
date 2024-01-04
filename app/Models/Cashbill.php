<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Cashbill extends Model
{

    use LogsActivity;
    protected $fillable = [
        'bill_number',
'bill_date',
'delivered_to_id',
'dropdown consignee party',
'delivered_by',
'any text',
'delivered_taken_id',
'auto driver/vehicle id dropdown',
'door_open',
'hamali',
'salestax',
'door_delivery',
'total_amount',
'payment_type',
'print_type',
'created_by',
'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'cashbill';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }



}
