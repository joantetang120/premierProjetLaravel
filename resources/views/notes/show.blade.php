@extends('layout.note')

@section('content')
        <div class="card mt-5">
            <div class="card-header"><h4>Create Show</h4></div>
            <div class="card-body">
                <a href="{{ route('notes.index') }}" class="btn btn-info mb-3 btn-sms"> <i class="fa fa-arrow-left"></i>Retour</a>

               <div class="mt-4">
                <p><strong>Name:</strong>{{ $note->name }}</p>
                <p><strong>Detail:</strong>{{ $note->detail }}</p>
                <p><strong>Detail:
                    <img src="{{ asset('storage/' . $note->image) }}"  width="200" height="150" class="rounded border shadow-sm">
                </p>
               </div>

            </div>
        </div>
@endsection
