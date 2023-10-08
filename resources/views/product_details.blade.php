
@extends('layouts.app')

@section('content')
    
<div class="container">
<div class="ce col-md-6 col-lg-10 m-auto">
    <h1 class="mt-4 mb-5 text-center">Hello Client</h1>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card  text-bg-info bg-opacity-50 mb-3 p-2" >
                <h4 class="card-header">Product-{{$productID->id}}</h4>
                <div class="imgg">
                    <img src="{{asset('/images/'.$productID->image)}}" alt="error" srcset="" class="w-100" style="height:250px">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><span class="fw-bold">Name :</span> {{$productID->name}}</h5>
                  <p class="card-text"><span class="fw-bold">Description :</span> {{$productID->description}}</p>
                  @if ($productID->category)
                  <p class="card-text"><span class="fw-bold">Category : </span> <a href="{{route('category.show',$productID->category->id)}}">{{$productID->category->name}}</a> </p>
                    
                      @else
                          <p><span class="fw-bold">Category : </span>  None</p>
                      @endif
              
                  <p class="card-text"> <span class="fw-bold">Price : </span> :{{$productID->price}}</p>
                </div>
                <div class="b">
                    <a href="{{route('product.index')}}" class="btn btn-primary">Back</a>
                </div>
              </div>
        </div>

    </div>
      
</div>
</div>
@endsection

