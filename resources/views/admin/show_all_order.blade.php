@extends('admin.layout.master')
@section('title')
    show all oreders
@endsection
@section('content')



    @if (isset($job_order) && $job_order->count() > 0)


    @if (Session()->has('success'))
    <div class="alert alert-info">
        {{ Session()->get('success') }}
    </div>
@endif

        <div class="card" style='width: 100% overflow-x:auto'>
            <div class="card-header">
                <h4> show all orders</h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style=" width:100%">
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
                            <th style="width:10%; text-align:center"> OPeration</th>
                        </tr>
                    </thead>
                    <tbody>
                      


                        @foreach ($job_order as $item)


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
                                <td style="width:10% ; padding-top: 20px" class="text-align:center">
                                    <a href="{{route('edit_order',$item['id'])}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a style="" href="{{route('delete_order',$item['id'])}}" class="btn btn-danger btn-sm">Delete</a>
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





    @else
        <div style="text-align: center" class="alert alert-danger">
            <h4>there is no orders</h4>
        </div>
    @endif
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
    $('#example').DataTable();
           
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
