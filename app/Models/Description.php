<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Description extends Model
{

    use LogsActivity;
    protected $fillable = [
        'description',
        'created_by',
        'status'


    ];
    protected static $logFillable = true;
    protected static $logName = 'description';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
