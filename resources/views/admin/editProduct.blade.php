@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
    
                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="discount" type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $product->discount }}" required autocomplete="discount" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            
                                        <div class="col-md-6">
                                            <textarea id="description" type="number" class="form-control @error('description') is-invalid @enderror" name="description" >{{$product->description}}</textarea>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                           @if($product->description !="")

                                            <img src="{{url('storage/'.$product->image)}}" width="50px" />
                                           @endif
                                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                       
                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
