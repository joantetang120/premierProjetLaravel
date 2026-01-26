<x-mail::message>
# Salut {{$client->name}}

 Merci de vous etres inscrit sur notre plateforme {{config('app.name')}}

<x-mail::button :url="'http://127.0.0.1:8000/articles">
Accede a ton espace
</x-mail::button>

Merci, et a bientot<br>
{{ config('app.name') }}
</x-mail::message>
