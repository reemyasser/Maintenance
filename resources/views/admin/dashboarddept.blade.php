@extends('admin.layout.master')
@section('title')
    create book
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$count}}</h3>

              <p>Today Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#job_today_data"data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$job_not_done}}<sup style="font-size: 20px"></sup></h3>

              <p>jobs not finished</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#job_not_done_data" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$job_done}}</h3>

              <p>jobs finished</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#job_done_data"data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$all_job}}</h3>

              <p>all jobs </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('show.department.orders',Session()->get('department_id'))}}"  aria-controls="collapseExample"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        @foreach ($technician as $item)
            
       
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{$item['name']}}</span>
              <span class="info-box-number"> #jobs/department : {{$item['job_of_number']}}</span>
            </div>
           
            <!-- /.info-box-content -->
          </div>
          
          <!-- /.info-box -->
        </div>

        @endforeach




        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
     

      <div  id="job_not_done_data" class="collapse">
        <div class="card" style="width: 100%; overflow-x:auto">
            <div class="card-header">
                <h4> job not finished </h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered"  style="width:100% ; ">
                    <thead>
                        <tr>
                            <th style=" width:10% "> job number </th>
                            <th style=" width:10% "> Requester Name </th>
                            <th style=" width:10% "> telephone </th>
                            <th style=" width:10% "> Location </th>
                            <th style=" width:30% "> Description </th>
                            <th style=" width:10% "> Status </th>
                             <th style=" width:10% "> date </th>
                            <th style=" width:10% " class="text-align:center"> OPeration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Session()->has('success'))
                            <div class="alert alert-info">
                                {{ Session()->get('success') }}
                            </div>
                        @endif


                        @foreach ($job_not_done_data as $item)


                            <tr>
                                <td style="width:10% ">{{ $item['id'] }} </td>
                                <td style="width:10% ">{{ $item['requester_name'] }} </td>
                                <td style="width:10% "> {{ $item['telephone'] }} </td>
                                <td style="width:10% "> {{ $item['location'] }}</td>
                                <td style="width:30% "> {{ $item['description'] }}</td>
                                @if ($item['status']==0)
                                <td style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>
                                @else
                                <td style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>
                                @endif
                                <td style="width:10% ">{{ $item['created_at'] }} </td>
                                <td style="width:10% " class="text-align:center">
                                  <div class="printcli" name='{{ $item['id'] }}'>
                                    <a  href="{{ url("/print-order/$item->id") }}" name='{{ $item['id'] }}'  class="btnprint"><i class="fa fa-print" aria-hidden="true"></i> 

                                 <div class="resprint{{ $item['id'] }}" >   
                                    @if ($item['printed']==1)
                                    <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                                    @endif
                                 </div>
                                    </a>
                                    
                                    
                                </div>  
                                  <a style="margin-top: 15px;"  href="{{ route('put.techni',$item->id) }}"  class="btn btn-primary btn-sm">Assign</a>
                                 </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>


      <div  id="job_done_data" class="collapse">
        <div class="card" style="width: 100%; overflow-x:auto">
            <div class="card-header">
                <h4> job finished</h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100% ;">
                    <thead>
                        <tr>
                            <th style="width:10% "> job number </th>
                            <th style="width:10% "> Requester Name </th>
                            <th style="width:10% "> telephone </th>
                            <th style="width:10% "> Location </th>
                            <th style="width:30% "> Description </th>
                            <th style="width:10% "> Status </th>
                           
                            <th style="width:10% "> date </th>
                            <th style="width:10% " class="text-align:center"> OPeration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Session()->has('success'))
                            <div class="alert alert-info">
                                {{ Session()->get('success') }}
                            </div>
                        @endif


                        @foreach ($job_done_data as $item)


                            <tr>
                                <td style="width:10% ">{{ $item['id'] }} </td>
                                <td style="width:10% ">{{ $item['requester_name'] }} </td>
                                <td style="width:10% "> {{ $item['telephone'] }} </td>
                                <td style="width:10% "> {{ $item['location'] }}</td>
                                <td style="width:30% "> {{ $item['description'] }}</td>
                                @if ($item['status']==0)
                                <td style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>
                                @else
                                <td style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>
                                @endif
                                 <td style="width:10% ">{{ $item['created_at'] }} </td>
                                <td style="width:10% " class="text-align:center">
                                  <div class="printcli" name='{{ $item['id'] }}'>
                                    <a  href="{{ url("/print-order/$item->id") }}" name='{{ $item['id'] }}'   class="btnprint"><i class="fa fa-print" aria-hidden="true"></i> 

                                 <div class="resprint{{ $item['id'] }}" >   
                                    @if ($item['printed']==1)
                                    <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                                    @endif
                                 </div>
                                    </a>
                                    
                                    
                                </div>
                                  <a style="margin-top: 15px;"  href="{{ route('put.techni',$item->id) }}"  class="btn btn-primary btn-sm">Assign</a>
                                 </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div  id="job_today_data" class="collapse">
        <div class="card" style="width: 100%; overflow-x:auto">
            <div class="card-header">
                <h4> today jobs </h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered"  style="width:100% ; ">
                    <thead>
                        <tr>
                            <th style="width:10% "> job number </th>
                            <th style="width:10% "> Requester Name </th>
                            <th style="width:10% "> telephone </th>
                            <th style="width:10% "> Location </th>
                            <th style="width:30% "> Description </th>
                            <th style="width:10% "> Status </th>
                           
                            <th style="width:10% "> date </th>
                            <th style="width:10% " class="text-align:center"> OPeration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Session()->has('success'))
                            <div class="alert alert-info">
                                {{ Session()->get('success') }}
                            </div>
                        @endif


                        @foreach ($job_today_data as $item)


                            <tr>
                                <td style="width:10% ">{{ $item['id'] }} </td>
                                <td style="width:10% ">{{ $item['requester_name'] }} </td>
                                <td style="width:10% "> {{ $item['telephone'] }} </td>
                                <td style="width:10% "> {{ $item['location'] }}</td>
                                <td style="width:30% "> {{ $item['description'] }}</td>
                                @if ($item['status']==0)
                                <td style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>
                                @else
                                <td style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>
                                @endif
                               
                                <td style="width:10% ">{{ $item['created_at'] }} </td>
                                <td style="width:10% " class="text-align:center">
                                  <div class="printcli" name='{{ $item['id'] }}'>
                                    <a  href="{{ url("/print-order/$item->id") }}"  name='{{ $item['id'] }}'   class="btnprint"><i class="fa fa-print" aria-hidden="true"></i> 

                                 <div class="resprint{{ $item['id'] }}" >   
                                    @if ($item['printed']==1)
                                    <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                                    @endif
                                 </div>
                                    </a>
                                    
                                    
                                </div>    
                                  <a style="margin-top: 15px;"  href="{{ route('put.techni',$item->id) }}"  class="btn btn-primary btn-sm">Assign</a>
                                  </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>


        

     

    </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection
  @section('script')
    <script>
        $(document).ready(function() {
    $('.table').DataTable();


    $('.btnprint').click(function(){
        var value=$(this).attr('name');
        
       
        $.ajax({
            type: "Post",
            url: "{{ route('resprint') }}",
            async: false,
            data:{
                '_token':"{{ csrf_token()}}",
                'val':value
            },
            success:function(articles)
            {
               
                $(".resprint"+value).html(articles);
               
            }
        });

  

    });



} );
        </script>

@endsection
