<!DOCTYPE html>
<html>
    <head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="by my-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Add category</a>

    </div>
<div class="ce col-md-6 col-lg-10 m-auto">
    <h1 class="mt-4 mb-5 text-center">All Category From DataBase</h1>
    <table class="table text-center">
        <thead><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Logo</th>
            <th> Operation</th>
        </tr>
        
     </thead>
 
     <tbody> 
        
        @foreach ($categories as $category)
         <tr>
        <th>{{$category->id}}</th>
            <th>{{$category->name}}</th>
            <th style="width: 100px"> <img src="{{asset('/images/categoryLogo/'.$category->logo)}}" alt="error" srcset=""style="height:50px;width:50px; border-radius:50%; "> </th>
            {{-- <th>{{$category->logo}}</th> --}}
         
            <th class="d-flex justify-content-center">
                <a href="{{route('category.show',$category->id)}}" class="btn btn-primary ">View</a>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success mx-1">Update</a>
                <form action="{{route('category.destroy',$category->id)}}" method="post">
                    @csrf
                    @method("delete")
                    <input type="submit" class="btn btn-danger" value="delete">
                </form>
            </th>
         
        </tr>
      
        @endforeach

    </tbody>
</table>

</div>
</div>

@endsection

<script type="text/javascript" >
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to Delete this post",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,

        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }  
        });
    }
</script>



</head>
</html>


