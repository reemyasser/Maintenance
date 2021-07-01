@extends('admin.layout.master')
@section('title')
choose technicians
@endsection
@section('content')


<div class="container">


<form action="{{route('store.techni',$id)}}" method="POST">
<div class="card">
  <div class="card-header"> choose technicians </div>
  <div class="card-body">

  
@csrf
    <div class="form-group">
        <label for="exampleFormControlSelect2"> select one or multiple technicians </label>
        <select required multiple class="form-control" name="techni[]" id="exampleFormControlSelect2">
          @foreach ($technicians as $item)
          <option value="{{$item['id']}}">{{$item['name']}}</option>
          @endforeach
          
         
         
        </select>
      </div>
      <div style="text-align: center">
        <button type="submit"  name="submit" class="btn btn-primary"> Create</button>
    </div>
</form>
</div>
</div>
</div>
@endsection
@section('script')
   
<script>
    $(document).ready(function() {
       
        $.ajax({
            type: "Post",
            url: "{{ route('refresh.order') }}",
            data:{
                '_token':"{{ csrf_token()}}"
            },
            success:function(articles)
            {
               
                $("#res").html(articles);
                $('#example').DataTable();
            }
        });
   

});
    </script>
    @endsection