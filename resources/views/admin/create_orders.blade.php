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
            <div class="card-header"> Create Oreder </div>
            <div class="card-body">

                <!--to upload images to the server-->

                <form action="{{route('store.order')}}" method="POST">
                     @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="form-group">
                        <label> Requester name </label>
                        <input type="text" required class="form-control" name="Requester_name" value="{{ old('name') }}">

                    </div>
                    <div class="form-group">
                        <label> telephone </label>
                        <input type="tel" required class="form-control" name="telephone" value="{{ old('name') }}">

                    </div>
                    <div class="form-group">
                        <label> location </label>
                        <input type="tel" required class="form-control" name="location" value="{{ old('name') }}">

                    </div>
                    <div class="form-group">
                        <label> description </label>
                        <textarea required cols="4" rows="4" class="form-control" name="description"
                            value="{{ old('name') }}"></textarea>

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
                        <button type="submit" id="cli" name="submit" class="btn btn-primary"> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

@endsection
