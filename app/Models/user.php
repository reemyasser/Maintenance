<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    protected $table='users';
    protected $fillable=['user_name','password','role','department_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function departments()
    {
        return $this->belongsTo('App\Models\department','department_id','id');
    
    }
}
