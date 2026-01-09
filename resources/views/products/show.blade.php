@extends('layout.product')

@section('content')
        <div class="card mt-5">
            <div class="card-header"><h4>Product Show</h4></div>
            <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-info mb-3 btn-sms"> <i class="fa fa-arrow-left"></i>Retour</a>

               <div class="mt-4">
                <p><strong>Name:</strong>{{ $product->name }}</p>
                <p><strong>Detail:</strong>{{ $product->detail }}</p>
               </div>

            </div>
        </div>
@endsection
