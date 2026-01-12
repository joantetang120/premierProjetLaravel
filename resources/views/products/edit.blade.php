@extends('layout.product')

@section('content')
        <div class="card mt-5">
            <div class="card-header"><h4>Product Edit</h4></div>
            <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-info mb-3 btn-sms"> <i class="fa fa-arrow-left"></i>Retour</a>

                <form action="{{ route('products.update', $product->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-2">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $product->name }}">
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="">Detail</label>
                        <textarea type="text" name="detail"  placeholder="Detail" class="form-control">{{ $product->detail }}</textarea>
                        @error("detail")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i>Submit</button>
                    </div>
                </form>

            </div>
        </div>

@endsection
