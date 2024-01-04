<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Party extends Model
{

    use LogsActivity;
    protected $fillable = [
        'party_name',
        'party_add1',
        'party_add2',
        'party_email',
        'party_phoneno',
        'party_c_person',
        'party_mobile',
        'party_gstno',
        'party_status'

    ];
    protected static $logFillable = true;
    protected static $logName = 'party';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['party_status'] = ($status)? 1 : 0;
    }

}
