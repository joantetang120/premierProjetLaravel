{{-- @extends('layout.note')

@section('content')
        <div class="card mt-5">
            <div class="card-header"><h4>Note Create</h4></div>
            <div class="card-body">
                <a href="{{ route('notes.index') }}" class="btn btn-info mb-3 btn-sms"><i class="fa fa-arrow-left"></i>Retour</a>

                <form action="{{ route('notes.store')}}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="">Detail</label>
                        <textarea type="text" name="detail"  placeholder="Detail" class="form-control"></textarea>
                        @error("detail")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>

            </div>
        </div>

@endsection --}}


@extends('layout.note')

@section('content')
<div class="card mt-5">
    <div class="card-header"><h4>Note Create</h4></div>
    <div class="card-body">
        <a href="{{ route('notes.index') }}" class="btn btn-info mb-3 btn-sm"><i class="fa fa-arrow-left"></i> Retour</a>

        <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
            @include('notes.fields')
        </form>
    </div>
</div>
@endsection
