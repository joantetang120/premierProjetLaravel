@extends('layout.note')

@section('content')
<h1>Bienvenu {{auth()->user()->name}}</h1>
    <h1>Email: {{auth()->user()->email}}</h1>
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button class="cursor-pointer hover:underline" type="submit">Deconnection</button>
    </form>
    <div class="card mt-5">
        <div class="card-header"><h4>Note List</h4></div>
        <div class="card-body">
            {{-- Message de succès --}}
            @session("success")
                <div class="alert alert-success">{{ $value }}</div>
            @endsession

            <a href="{{ route('notes.create') }}" class="btn btn-success mb-3 btn-sms">
                <i class="fa fa-plus"></i> Create Note
            </a>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">ID</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th width="300px">Image</th>
                        <th width="10px">Creer par</th>
                        <th width="300px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->id }}</td>
                        <td>{{ $note->name }}</td>
                        <td>{{ $note->detail }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $note->image) }}"  width="200" height="150" class="rounded border shadow-sm">
                        </td>
                        <td>
                            {{  $note->client ? $note->client->name : 'Anonyme' }}
                        </td>
                        <td>
                            {{-- Formulaire de suppression unique pour chaque note --}}
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" id="form-delete-{{ $note->id }}">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('notes.show', $note) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i> view
                                </a>
                                <a href="{{ route('notes.edit', $note) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil"></i> edit
                                </a>

                                {{-- Bouton qui déclenche le modal --}}
                                <button type="button" class="btn btn-danger btn-sm" onclick="openDialog('form-delete-{{ $note->id }}')">
                                    <i class="fa fa-trash"></i> delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- STRUCTURE DU MODAL (BACKDROP) --}}
    <div id="backdrop" class="modal-custom">
        <div role="alertdialog" aria-modal="true" aria-labelledby="dialog_label" aria-describedby="dialog_desc" class="modal-content-custom">
            <h2 id="dialog_label">Confirmation</h2>
            <div id="dialog_desc">
                <p>Voulez-vous vraiment supprimer cette note ?</p>
            </div>
            <div class="modal-footer-custom">
                <button id="close-btn" class="btn btn-secondary" type="button">Non. Fermer.</button>
                <button id="confirm-btn" class="btn btn-danger" type="button">Oui. Supprimer.</button>
            </div>
        </div>
    </div>

    {{-- CSS POUR LE MODAL --}}
    <style>
        .modal-custom {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
        }
        .modal-content-custom {
            background: white;
            width: 90%;
            max-width: 400px;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .modal-footer-custom {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .no-scroll {
            overflow: hidden;
        }
    </style>

    {{-- JAVASCRIPT --}}
    <script>
        let formToSubmit = null;

        function openDialog(formId) {
            formToSubmit = formId;
            document.getElementById("backdrop").style.display = "block";
            document.body.classList.add("no-scroll");
        }

        function closeDialog() {
            document.getElementById("backdrop").style.display = "none";
            document.body.classList.remove("no-scroll");
            formToSubmit = null;
        }

        function deleteFile() {
            if (formToSubmit) {
                document.getElementById(formToSubmit).submit();
            }
        }

        // Écouteurs d'événements selon ta demande
        document.getElementById("close-btn").addEventListener("click", () => {
            closeDialog();
        });

        document.getElementById("confirm-btn").addEventListener("click", () => {
            deleteFile();
        });

        // Fermer si on clique à l'extérieur du carré blanc
        window.onclick = function(event) {
            let backdrop = document.getElementById("backdrop");
            if (event.target == backdrop) {
                closeDialog();
            }
        }
    </script>
@endsection
