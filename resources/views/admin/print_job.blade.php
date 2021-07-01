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


        <div>
            <div style=" width: 70%;
            float: left;"><h2>Zahran Limited </h2></div>
            
          <div style=" width: 30%;
          float: left;">  <img src="{{asset('dist/img/avatar2.png')}}"></div>
        </div>

        <h3> <strong> {{ $job_department['departments']['department_name'] }}</strong></h3>
        <hr>
        <div class="row">
            <div class="col-6">
                <div class="lbl-print">
                    <label  class="lbl-txt"><strong> Job Number :</strong> </label> {{ $job_department['id'] }}
                </div>
                <br>
                <div class="lbl-print">
                    <label class="lbl-txt"> <strong>description :</strong> </label> <div class="lbl-dis"> {{ $job_department['description'] }}</div>
                </div>
                
                <div class="lbl-print">
                    <label class="lbl-txt"><strong> Technician Names :</strong> </label> @foreach ( $job_tech['technicians'] as $item)
                   ( {{  $item['name'] }} )
                    @endforeach 
                </div>
                <br>
               
            </div>
            <div class="col-6">
                <div class="lbl-print">
                    <label class="lbl-txt"><strong> Date : </strong></label> {{ $job_department['created_at'] }}
                </div>
                <br>
                <div class="lbl-print">
                    <label class="lbl-txt"><strong> Location : </strong></label> {{ $job_department['location'] }}
                </div>
                <br>
                <div class="lbl-print">
                    <label class="lbl-txt"> <strong> Telephone :</strong> </label> {{ $job_department['telephone'] }}
                </div>
                <br>
               
            </div>

            <div class="col-12">
                <div class="lbl-print">
                    <label class="lbl-txt"> <strong> spare parts : </strong></label> <textarea style="width: 100%" cols="4" rows="4" readonly ></textarea>
                </div>
            </div>
            <div class="col-6" style="  margin-top: 350px; margin-bottom: 100px;">
            
                    <label class="lbl-txt"> Head Name : </label> <strong  style="font-size: 24px"> {{ $job_department['departments']['head_name'] }}</strong>
                
                <br>
                <label class="lbl-txt"> signature  </label>
            </div>
            <div class="col-6" style="margin-top: 350px; margin-bottom: 100px;">
               
                    <label class="lbl-txt">  Requester Name : </label> <strong style="font-size: 24px"> {{ $job_department['requester_name'] }}</strong>
            
                <br>
                <label class="lbl-txt"> signature  </label>
            </div>

        </div>
    </div>


@endsection
