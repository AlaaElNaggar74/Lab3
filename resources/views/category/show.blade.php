
@extends('layouts.app')

@section('content')
    
<div class="container">
<div class="ce col-md-6 col-lg-10 m-auto">
    <h1 class="mt-4 mb-5 text-center">Hello Client</h1>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card  text-bg-info bg-opacity-50 mb-3 p-2" >
                <h4 class="card-header">Category-{{$category->id}}</h4>
                <div class="imgg">
                    <img src="{{asset('/images/categoryLogo/'.$category->logo)}}" alt="error" srcset="" class="w-100" style="height:250px">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Name : {{$category->name}}</h5>
                  <h5 class="card-title">created at: {{$category->created_at}}</h5>
                  <h5 class="card-title">updated at : {{$category->updated_at}}</h5>
                </div>
                <div class="b">
                    <a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
                </div>
              </div>
        </div>

    </div>
      <h1>Products In This Category</h1>
      <ol>

        @foreach ($category->products as $product)
            <li>{{$product->name}}</li>
        @endforeach
      </ol>
</div>
</div>
@endsection

