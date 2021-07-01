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
        <input type="hidden" name="_taken" value="{{ csrf_token() }}">
<div class="container">
    <div class="row">

    <div class="col-12">
        <div id="res" style='overflow-x:auto' >

            <div class="card" style="width: 100%; overflow-x:auto" id="card_dept">
                <div class="card-header" style=" width: 100%;">
                    <h4 > {{ $job_order[0]['departments']['department_name'] }} orders</h4>
                </div>
                <div class="card-body" >
                    <table id="example" class="table table-striped table-bordered"
                        style=" width:100% ;  ">

                        <thead>
                            <tr>
                                <th style="width:10% "> job number </th>
                                <th style="width:10% "> Requester Name </th>
                                <th style="width:10% "> telephone </th>
                                <th style="width:10% "> Location </th>
                                <th style="width:30% "> Description </th>
                                <th style="width:10% "> Status </th>

                                <th style="width:10% "> date </th>
                                <th style="width:10%; text-align:center"> OPeration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session()->has('success'))
                                <div class="alert alert-info">
                                    {{ Session()->get('success') }}
                                </div>
                            @endif


                            @foreach ($job_order as $item)


                                <tr>
                                    <td style="width:10% ">{{ $item['id'] }} </td>
                                    <td style="width:10% ">{{ $item['requester_name'] }} </td>
                                    <td style="width:10% "> {{ $item['telephone'] }} </td>
                                    <td style="width:10% "> {{ $item['location'] }}</td>
                                    <td style="width:30% "> {{ $item['description'] }}</td>
                                    @if ($item['status'] == 0)
                                        <td style="width:10% "> <i class="fa fa-times" style="color: red"
                                                aria-hidden="true"></i> </td>
                                    @else
                                        <td style="width:10% "> <i class="fa fa-check" style="color: green"
                                                aria-hidden="true"></i></td>
                                    @endif
                                    <td style="width:10% ">{{ $item['created_at'] }} </td>
                                    <td style=" width:10% ;text-align:center ">

                                        <div class="printcli" name='{{ $item['id'] }}'>
                                            <a href="{{ url("/print-order/$item->id") }}" name='{{ $item['id'] }}'
                                                class="btnprint"><i class="fa fa-print" aria-hidden="true"></i>

                                                <div class="resprint{{ $item['id'] }}">
                                                    @if ($item['printed'] == 1)
                                                        <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                                                    @endif
                                                </div>
                                            </a>


                                        </div>
                                        <a style="margin-top: 15px;" href="{{ route('put.techni', $item->id) }}"
                                            class="btn btn-primary btn-sm">Assign</a>


                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    
    @else
        <div style="text-align: center" class="alert alert-danger">
            <h4>there is no orders</h4>
        </div>

    @endif
</div>
</div>
</div>

@stop
@section('script')

    <script>
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    type: "Post",
                    url: "{{ route('refresh.order') }}",
                    data: {
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(articles) {

                        $("#res").html(articles);
                        $('#example').DataTable();
                    }
                });
            }, 20000);

            $('.btnprint').click(function() {
                var value = $(this).attr('name');

                $.ajax({
                    type: "Post",
                    url: "{{ route('resprint') }}",
                    async: false,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'val': value
                    },
                    success: function(articles) {
                        $(".resprint" + value).html(articles);

                    }
                });

            });

        });

    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            
        });

    </script>


@endsection
