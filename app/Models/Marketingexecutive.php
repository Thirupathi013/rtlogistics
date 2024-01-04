<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Marketingexecutive extends Model
{

    use LogsActivity;
    protected $fillable = [
        'me_name',
        'me_email',
        'me_mobile',
        'created_by',
        'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'marketingexecutive';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
