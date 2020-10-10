@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Dashboard</div>

                <div class="card-body">
                  
                    <div class="row">
                   @foreach($products as $item)
                   <div class="col-md-6">
                    <div class="card mb-2" style="height:100%">                          
                            <img class="card-img-top"  src="{{url('storage/'.$item->image)}}" width="200px" height="200px"/>
                            <div class="card-body">
                              <h5 class="card-title">{{$item->name}}</h5>
                              <h5 class="card-title">{{$item->price}}</h5>
                              @if($item->discount > 0)
                              Discount Price: 
                              <h5 class="card-title">{{($item->price *(1-$item->discount/100))}}</h5>
                              <small class="card-title">{{$item->discount}} %</small>
                              @endif
                              <p class="card-text">{{$item->description}}</p>
                              
                            </div>
                    </div>
                </div>
                   @endforeach
                    
                </div>
            </div>
            {{ $products->links('admin.pagination') }}
        </div>
    </div>
</div>
@endsection
