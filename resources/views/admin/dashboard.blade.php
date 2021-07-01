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
          <div class="small-box  bg-success">
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
            <a href="{{route('show.orders')}}"  aria-controls="collapseExample"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

       






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
                <table id="example" class="table table-striped table-bordered"  style=" width:100% ;">
                    <thead>
                        <tr>
                            <th style="width:10% " > job number </th>
                            <th style="width:10% "> Requester Name </th>
                            <th style="width:10% "> telephone </th>
                            <th style="width:10% "> Location </th>
                            <th style="width:20% "> Description </th>
                            <th style="width:10% "> Status </th>
                            <th style="width:10% "> department </th>
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


                        @foreach ($job_not_done_data as $item)


                            <tr>
                                <td style="width:10% ">{{ $item['id'] }} </td>
                                <td style="width:10% ">{{ $item['requester_name'] }} </td>
                                <td style="width:10% "> {{ $item['telephone'] }} </td>
                                <td style="width:10% "> {{ $item['location'] }}</td>
                                <td style="width:20% "> {{ $item['description'] }}</td>
                                @if ($item['status']==0)
                                <td class="rescheck{{$item['id']}}" style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>
                                @else
                                <td class="rescheck{{$item['id']}}" style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>
                                @endif
                               
                                <td style="width:10% ">{{ $item['departments']['department_name'] }} </td>
                                <td style="width:10% ">{{ $item['created_at'] }} </td>
                                <td style="width:10% " class="text-align:center">
                                  <a href="{{route('edit_order',$item['id'])}}" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="{{route('delete_order',$item['id'])}}" class="btn btn-danger btn-sm">Delete</a>
                            
                                  <label style=" font-size: 14px; font-family: serif"> job finished</label> 
                                  @if ($item['status']==1)
                                  <input checked value="{{ $item['id'] }}" class="checkfinished" type="checkbox">
                                  @else
                                  <input  value="{{ $item['id'] }}" class="checkfinished" type="checkbox">
                                  @endif
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
                <table id="example" class="table table-striped table-bordered" style=" width:100%;">
                    <thead>
                        <tr>
                            <th style="width:10% "> job number </th>
                            <th style="width:10% "> Requester Name </th>
                            <th style="width:10% "> telephone </th>
                            <th style="width:10% "> Location </th>
                            <th style="width:20% "> Description </th>
                            <th style="width:10% "> Status </th>
                            <th style="width:10% "> department </th>
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
                                <td style="width:20% "> {{ $item['description'] }}</td>
                                @if ($item['status']==0)
                                <td class="rescheck{{$item['id']}}" style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>
                                @else
                                <td class="rescheck{{$item['id']}}" style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>
                                @endif
                               
                                <td style="width:10% ">{{ $item['departments']['department_name'] }} </td>
                                <td style="width:10% ">{{ $item['created_at'] }} </td>
                                <td style="width:10% " class="text-align:center">
                                  <a href="{{route('edit_order',$item['id'])}}" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="{{route('delete_order',$item['id'])}}" class="btn btn-danger btn-sm">Delete</a>
                                  <label style=" font-size: 14px; font-family: serif"> job finished</label> 
                                  @if ($item['status']==1)
                                  <input checked value="{{ $item['id'] }}" class="checkfinished" type="checkbox">
                                  @else
                                  <input  value="{{ $item['id'] }}" class="checkfinished" type="checkbox">
                                  @endif
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
                <table id="example" class="table table-striped table-bordered"  style=" width:100%;">
                    <thead>
                        <tr>
                            <th style="width:10% "> job number </th>
                            <th style="width:10% "> Requester Name </th>
                            <th style="width:10% "> telephone </th>
                            <th style="width:10% "> Location </th>
                            <th style="width:20% "> Description </th>
                            <th style="width:10% "> Status </th>
                            <th style="width:10% "> department </th>
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
                                <td style="width:20% "> {{ $item['description'] }}</td>
                                @if ($item['status']==0)
                                <td class="rescheck{{$item['id']}}" style="width:10% "> <i class="fa fa-times" style="color: red" aria-hidden="true"></i> </td>
                                @else
                                <td class="rescheck{{$item['id']}}" style="width:10% "> <i class="fa fa-check" style="color: green" aria-hidden="true"></i></td>
                                @endif
                               
                                <td style="width:10% ">{{ $item['departments']['department_name'] }} </td>
                                <td style="width:10% ">{{ $item['created_at'] }} </td>
                                <td style="width:10% " class="text-align:center">
                                  <a href="{{route('edit_order',$item['id'])}}" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="{{route('delete_order',$item['id'])}}" class="btn btn-danger btn-sm">Delete</a>
                                  <label style=" font-size: 14px; font-family: serif"> job finished</label> 
                                  @if ($item['status']==1)
                                  <input checked value="{{ $item['id'] }}" class="checkfinished" type="checkbox">
                                  @else
                                  <input  value="{{ $item['id'] }}" class="checkfinished" type="checkbox">
                                  @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>


      <div class="col-md-12">
        <p class="text-center">
          <strong>count of job for department </strong>
        </p>
        @php
            $i=0;
            @endphp
        @foreach ($departments as $item)
        @php
        
        
            if ($i % 4== 0)
            {
                $val="primary";
            }	
            if ($i % 4== 1)
            {
                $val="danger";
            }	
            if ($i % 4== 2)
            {
                $val="success";
            }	
            if ($i % 4== 3)
            {
                $val="warning";
            }	
            $per=(( App\Models\job_order::where('department_id',$item['id'])->count())/(App\Models\job_order::count()))*100;
            @endphp

        <div class="progress-group">
         {{$item['department_name']}}
          <span class="float-right"><b>{{App\Models\job_order::where('department_id',$item['id'])->count()}}</b>/{{App\Models\job_order::count()}}</span>
          <div class="progress progress-sm">
            <div class="progress-bar bg-{{$val}}" style="width: {{$per}}%"></div>
          </div>
        </div>
        <!-- /.progress-group -->

        

      @php
      $i++;
      @endphp
      @endforeach

    </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection
  @section('script')
    <script>
        $(document).ready(function() {
    $('.table').DataTable();





            
    $('.checkfinished').change(function(){
        var val=0;
            if($(this).is(':checked')){
            val=$(this).val();
         
            $.ajax({
            type: "Post",
            url: "{{ route('checked') }}",
            data:{
                '_token':"{{ csrf_token()}}",
                'val':val,
                'k':1
                
            },
            success:function(articles)
            {
              
                $(".rescheck"+val).html(articles);
               
            }
        });
            }
            else if($(this).not(':checked')){
                
                val=$(this).val(); 
               
                $.ajax({
            type: "Post",
            url: "{{ route('checked') }}",
            data:{
                '_token':"{{ csrf_token()}}",
                'val':val,
                'k':0
                
            },
            success:function(articles)
            {
              
                $(".rescheck"+val).html(articles);
                
            }
        });
                
                }
        
    });
} );
        </script>

@endsection
