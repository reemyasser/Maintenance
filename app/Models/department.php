<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
   
    protected $table='departments';
    protected $fillable=['department_name','head_name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

    public function users()
    {
        return $this->hasMany('App\Models\user','id','department_id');
    
    }
    public function technicians()
    {
        return $this->hasMany('App\Models\technician','id','department_id');
    
    }
    public function job_orders()
    {
        return $this->hasMany('App\Models\job_order','id','department_id');
    
    }
   
}
