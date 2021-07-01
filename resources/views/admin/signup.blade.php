

<head>
    <link rel="stylesheet" href="{{ asset('form/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('form/css/style.css') }}">
  
   
</head>


    @extends('admin.layout.master')
@section('title')
sign up
@endsection
@section('content')

    <div class="main">
       

        <!-- Sign up form -->
        <section class="signup">
           
            <div class="container">
                @if (Session()->has('failed'))
                <div class="danger">{{Session()->get('failed')}}</div>
                @endif
                @if (Session()->has('success'))
                <div class="alert alert-success">{{Session()->get('success')}}</div>
                @endif
                <div class="signup-content">
                    <div class="signup-form">
                       
                       
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{route('createuser')}}" method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                
                                <input required  value="{{old('user_name')}}" type="text" name="user_name" id="name" placeholder=" user name" />
                            </div>

                            <div class="form-group" >
                                <label for="role">  <i class="zmdi zmdi-chevron-down"></i></label>
                                
                                <select  required style="color: #999" type="text"  name="role" id="role"  >
                                    
                                    <option value = "-1" selected="true" >Choose type</option>
                                    <option value="0" >Admin</option>
                                    <option value="1" >user of department</option>
                                </select>
                       </div>

                            <div class="form-group" id="dept">
                               
                                <label for="department">  <i class="zmdi zmdi-chevron-down"></i></label>
                                    
                                <select required style="color: #999" type="text" name="department" id="department" placeholder=" type" >
                                         <option value="-1" selected="true" >Choose Departmets</option>
                                         @foreach ($department as $item)
                                         <option value="{{$item['id']}}" >{{$item['department_name']}}</option>
                                         @endforeach
                                     </select>
                            </div>
                           





                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input required type="password" name="password" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label ><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="confirmpass" placeholder="Confirm Password" />
                            </div>

                            <div class="form-group form-button">
                                <input required type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('form/images/signup-image.jpg')}}" alt="sing up image"></figure>

                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
     
    </div>

    <!-- JS -->
    
    <script src="{{ asset('form/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('form/js/main.js') }}"></script>
    @endsection
@section('script')
    
@endsection