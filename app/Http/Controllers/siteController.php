<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\job_order;
use App\Models\technician;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class siteController extends Controller
{
    //
    public function create_order()
    {
       $departments= department::get();
        return view('admin.create_orders',compact('departments'));
    }
    public function store_order(Request $request)
    {
       job_order::create([
        'requester_name'=>$request->Requester_name,
        'telephone'=>$request->telephone,
        'location'=>$request->location,
        'description'=>$request->description,
        'department_id'=>$request->department,
        'status'=>false,
        'printed'=>0,
        'user_name'=>Session()->get('name')
       ]);
     
        return redirect()->back()->with('success','created sucessfully');
    }
    public function refresh()
    {
      $job_order= job_order::with('departments')->where('department_id',Session()->get('department_id'))->get();
     // echo $job_order[0]['departments']['department_name'];


        
      echo '<div class="card"  style="width: 100%; overflow-x:auto"  id="card_dept" >
                 <div class="card-header">
                     <h4> '.$job_order[0]['departments']['department_name'].'  orders</h4>
                 </div>
                 <div class="card-body">
                     <table id="example"class="table table-striped table-bordered" style="   width:100% ;">
                         <thead>
                             <tr>
                                 <th style="width:10% "> job number </th>
                                 <th style="width:10% "> Requester Name </th>
                                 <th style="width:10% "> telephone </th>
                                 <th style="width:10% "> Location </th>
                                 <th style="width:30% " > Description </th>
                                 <th style="width:10% "> Status </th>
                             
                                 <th style="width:10% "> date </th>
                                 <th style="width:10% ; text-align:center"> OPeration</th>
                             </tr>
                         </thead>
                         <tbody>';
                            
     
                       foreach($job_order as $item){
                       
                          echo "<tr>
                               <td style='width:10% '> $item->id </td>
                               <td style='width:10% '> $item->requester_name </td>
                               <td style='width:10% '>  $item->telephone </td>
                               <td style='width:10% '>  $item->location </td>
                               <td style='width:30% ' >  $item->description </td>";
                               
                               if ($item['status']==0){
                              echo ' <td style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>';
                               }else{
                              echo' <td style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>';
                               }
                             
                           echo "<td style='width:10% '> $item->created_at </td>
                               <td style=' width:10% ;text-align:center '>
                               <div class='printcli' name='$item->id'>
    
                                   <a  href='".route('print_order',$item->id)."' ' name='$item->id' class='btnprint'><i class='fa fa-print' aria-hidden='true'></i>
                                   <div class='resprint$item->id' >"; 
                                   if ($item->printed==1){
                                  echo' <i class="fa fa-check" style="color: green" aria-hidden="true"></i>';}
                                else{
                               echo'    <i class="fa fa-times" style="color: red" aria-hidden="true"></i>';
                                }
                                  echo"
                                </div>
                                   </a>
                                   </div>
                                   <a style='margin-top: 15px;'  href='".route('put.techni',$item->id)."'  class='btn btn-primary btn-sm'>Assign</a>
                                 
                                  
                               </td>
                           </tr>";
                             }
     
     
                                
                            
                       
                        echo "</tbody>    </table> </div>
                         </div>";
              
    }

    public function show_all_order(){


       $job_order= job_order::with('departments')->get();
       return view('admin.show_all_order',compact('job_order'));
       

     
    }
    public function show_department_order(){


        $job_order= job_order::with('departments')->where('department_id',Session()->get('department_id'))->get();
        return view('admin.show_department_order',compact('job_order'));
        
 
      
     }

     public function dashboard()
     {


        $today = Carbon::now()->format('Y-m-d').'%';
                   
        
        $count=job_order::where('created_at','like', $today)->count();
        
       $job_not_done =job_order::where('status',0)->count();
       $job_done =job_order::where('status',1)->count();
       $all_job =job_order::count();


       $job_today_data=job_order::where('created_at','like', $today)->get();
        $job_not_done_data =job_order::where('status',0)->get();
        $job_done_data =job_order::where('status',1)->get();
        $all_job_data =job_order::get();
        $departments =department::get();


         return view('admin.dashboard',compact('departments','all_job_data','job_done_data','job_not_done_data','job_today_data','count','job_not_done','job_done','all_job'));
     }
     public function deptdashboard()
     {


        $today = Carbon::now()->format('Y-m-d').'%';
                  
            
        $count=job_order::where('created_at','like', $today)->where('department_id',Session()->get('department_id'))->count();
        
       $job_not_done =job_order::where('status',0)->where('department_id',Session()->get('department_id'))->count();
       $job_done =job_order::where('status',1)->where('department_id',Session()->get('department_id'))->count();
       $all_job =job_order::where('department_id',Session()->get('department_id'))->count();


       $job_today_data=job_order::where('created_at','like', $today)->where('department_id',Session()->get('department_id'))->get();
        $job_not_done_data =job_order::where('status',0)->where('department_id',Session()->get('department_id'))->get();
        $job_done_data =job_order::where('status',1)->where('department_id',Session()->get('department_id'))->get();
        $all_job_data =job_order::where('department_id',Session()->get('department_id'))->get();
       $technician= technician::where('department_id',Session()->get('department_id'))->orderBy('job_of_number','desc')->get();

         return view('admin.dashboarddept',compact('technician','all_job_data','job_done_data','job_not_done_data','job_today_data','count','job_not_done','job_done','all_job'));
     }
     public function edit_order($id)
     {
      $departments=  department::get();
     $job= job_order::find($id);
        return view('admin.edit_order',compact('departments','job'));
     }
     public function update_order(Request $request,$id)
     {
      
     $job= job_order::find($id);
     $job->requester_name=$request->Requester_name;
      $job->telephone=$request->telephone;
      $job->location=$request->location;
      $job->description=$request->description;
      $job->department_id=$request->department;
   
      $job->save();
      
         return redirect()->route('show.orders')->with('success','updated sucessfully');
    
       
     }
     public function delete_order($id)

     {
      $job= job_order::find($id); 
      $job->delete(); 
     return redirect()->route('show.orders')->with('success','deleted sucessfully');
     
     }
     public function print_order($id)

     {
      $job_department= job_order::with('departments')->find($id);
      $job_tech= job_order::with('technicians')->find($id); 
      $job=job_order::find($id);
      $job->printed=1;
  
      $job->save();
      
      return view('admin.print_job',compact('job_department','job_tech'));
    
     }
     public function put_techni($id)
     {
       $dept_id= job_order::find($id);
      $technicians=  technician::where('department_id',$dept_id['department_id'])->get();
      return view('admin.puttech',compact('technicians','id'));
    
     }
     public function store_techni(Request $request,$id)
     {
  
        for($i=0 ;$i<count($request->techni);$i++){
     $techni=technician::findOrFail($request->techni[$i]);
     
     $techni->job_orders()->attach(
      
     $id
     );
     $techni->job_of_number=$techni->job_of_number+1;
     $techni->save();
   }
   return redirect()->route('show.department.orders')->with('success','deleted sucessfully');
     
    
     }
     public function create_technicians()
     {
        $departments=department::get();
        return view('admin.create-techni',compact('departments'));
     }
     public function store_technicians(Request $request)
     {
        technician::create([
           'name'=>$request->name,
           'department_id'=>$request->department,
           'job_of_number'=>0
        ]);
        return redirect()->back()->with('success','deleted sucessfully');
     }
    
     public function login()
     {
        return view('admin.login');
     }
     public function signin(Request $request)
     {
      $user=user::where('user_name','=',$request->user_name)
      ->where('password','=',$request->password)->get();
      
      if($user->count()> 0)
      {
          foreach($user as $item)
          {
              
              if($item->role==1){
              $request->session()->put('role1',$item->role);
              $request->session()->put('department_id',$item->department_id);
              $request->session()->put('name',$item->user_name);
             $department_name= department::find($item->department_id);
             
             $request->session()->put('department_name',$department_name['department_name']);
              $request->session()->put('department_id',$item->department_id);
              
              return redirect()->route('show.department.orders');
              }

              else
              {
                $request->session()->put('role',$item->role);
                $request->session()->put('name',$item->user_name);
                return redirect()->route('create.orders');
              }
          }
         
      }
      else{
            return redirect()->back()->withinput()->with('invalid','Email or Password invalid');
      }
     }
     public function signup()
     {
       $department= department::get();
        return view('admin.signup',compact('department'));
     }
     public function createuser(Request $request){    
     
      $user= user::where('user_name',$request->user_name)->get();
     
      
      if($user->count()>0)
      {
      
          return redirect()->back()->withInput()->with('failed',' the username is exist');
      }
    
     
      if($request->department == '-1' & $request->role == 1)
      {
          return redirect()->back()->withInput()->with('failed','please choose department');   
      }
     
      if($request->role == '-1')
      {
          return redirect()->back()->withInput()->with('failed','please choose role');   
      }
      if($request->role == 0)
      {
        $request->department=0;
      }

      if($request->password!=$request->confirm_password)
      {
          return redirect()->back()->withInput()->with('failed','the password not matching');   
      }
      
       user::create([
      'user_name'=>$request->user_name,
      'department_id'=>$request->department,
      'password'=>$request->password,
      'role'=>$request->role
      ]);
         return redirect()->back()->with('success','created Successfully');
      }
 
public function logout(Request $request)
{
    $request->session()->flush();
    return redirect()->route('login');

}

public function checked(Request $request)
{
    $job=job_order::find($request->val);
    $job->status=$request->k;

    $job->save();
    if($request->k==0)
    {
        echo' <i class="fa fa-times" style="color: red" aria-hidden="true"></i> 
        ';
    }
    else
    {
        echo ' <i class="fa fa-check" style="color: green" aria-hidden="true"></i>';
                           
    }
}

public function resprint(Request $request){

    $job=job_order::find($request->val);
    $job->printed=1;

    $job->save();
    if ($job['printed']==1){
  echo'  <i class="fa fa-check" style="color: green" aria-hidden="true"></i>';
    }
    else
    {
   echo' <i class="fa fa-times" style="color: red" aria-hidden="true"></i>';
   
}}

    }
