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
            <div class="card-header"> Create technicians </div>
            <div class="card-body">

                <!--to upload images to the server-->

                <form action="{{route('store.technicians')}}" method="POST">
                     @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="form-group">
                        <label> technicians name </label>
                        <input type="text" required class="form-control" name="name" value="{{ old('name') }}">

                    </div>
                    


                    <div class="form-group">
                        <label> Departments </label>
                        <select required name="department" class="form-control">

                            <option> </option>

                            @foreach ($departments as $item)
                                <option value="{{ $item['id'] }}"> {{ $item['department_name'] }} </option>
                            @endforeach

                        </select>

                    </div>









                    <br>
                    <div style="text-align: center">
                        <button type="submit"  name="submit" class="btn btn-primary"> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

@endsection
