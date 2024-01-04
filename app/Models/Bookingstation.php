<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Bookingstation extends Model
{
    protected $table='bookingstations';


    protected $fillable = ['bs_name','main_station','short_name','created_by','status'];



    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function lrdetails() {
        return $this->hasMany('App\Models\Lrdetail');
    }

}
