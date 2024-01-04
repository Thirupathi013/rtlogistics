<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Hamaliname extends Model
{

    use LogsActivity;
    protected $fillable = [
        'hamali_name',

        'created_by',
        'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'hamaliname';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
