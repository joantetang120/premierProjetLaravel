@extends('layout.product')

@section('content')
        <div class="card mt-5">
            <div class="card-header"><h4>Product List</h4></div>
            <div class="card-body">
                @session("success")
                    <div class="alert alert-success ">{{ $value }}</div>
                @endsession
                <a href="{{ route('products.create') }}" class="btn btn-success mb-3 btn-sms"><i class="fa fa-plus"></i> Create Product</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th width="50px">ID</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th width="300px">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                            {{-- <td></td> --}}
                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> view</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> edit</a>
                                    {{-- <a href="" class="btn btn-danger btn-sm">delete</a> --}}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

   @endsection
