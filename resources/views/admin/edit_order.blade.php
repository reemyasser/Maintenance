@extends('admin.layout.master')
@section('title')
    create book
@endsection
@section('content')
    <div class="container">


        @if (Session()->has('success'))
            <div class="alert alert-success">
                {{ Session()->get('success') }}
            </div>
        @endif




        <div class="card">
            <div class="card-header"> update Oreder </div>
            <div class="card-body">

                <!--to upload images to the server-->


                <form action="{{ route('update_order',$job['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label> Requester name </label>
                        <input type="text" required class="form-control" name="Requester_name"
                            value="{{ $job['requester_name'] }}">

                    </div>
                    <div class="form-group">
                        <label> telephone </label>
                        <input type="tel" required class="form-control" name="telephone" value="{{ $job['telephone'] }}">

                    </div>
                    <div class="form-group">
                        <label> location </label>
                        <input type="tel" required class="form-control" name="location" value="{{ $job['location'] }}">

                    </div>
                    <div class="form-group">
                        <label> description </label>
                        <textarea required cols="4" rows="4" class="form-control" name="description"
                            value="">{{ $job['description'] }}</textarea>

                    </div>



                    <div class="form-group">
                        <label> Departments </label>
                        <select required name="department" class="form-control">

                            <option> </option>

                            @foreach ($departments as $item)
                                @if ($job['department_id'] == $item['id'])
                                    <option selected value="{{ $item['id'] }}"> {{ $item['department_name'] }} </option>

                                @else

                                    <option value="{{ $item['id'] }}"> {{ $item['department_name'] }} </option>
                                @endif
                            @endforeach

                        </select>

                    </div>









                    <br>
                    <div style="text-align: center">
                        <button type="submit" name="submit" class="btn btn-primary"> update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
