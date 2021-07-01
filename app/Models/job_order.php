<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class job_order extends Model
{
    //
    protected $table='job_orders';
    protected $fillable=['description',	'location',	'status','requester_name','printed',	'department_id','user_name'	,'telephone','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function departments()
    {
        return $this->belongsTo('App\Models\department','department_id','id');
    
    }
    public function technicians()
    {
        return $this->belongsToMany('App\Models\technician','techni_job','job_id','techni_id','id','id');
    
    }

}
