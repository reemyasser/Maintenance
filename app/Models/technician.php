<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class technician extends Model
{
    //
    protected $table='technicians';
    protected $fillable=['name','job_of_number','department_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function departments()
    {
        return $this->belongsTo('App\Models\department','department_id','id');
    
    }
    public function job_orders()
    {
        return $this->belongsToMany('App\Models\job_order','techni_job','techni_id','job_id','id','id');
    
    }
}