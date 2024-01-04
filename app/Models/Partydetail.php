<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Partydetail extends Model
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
        'party_payment_type',
        'status',
        'marketing_executive_id',
        'created_by'




    ];
    protected static $logFillable = true;
    protected static $logName = 'partydetail';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }

}
