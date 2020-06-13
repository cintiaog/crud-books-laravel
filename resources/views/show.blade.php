@extends ('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <hr>
    
    <div class="col-12 m-auto">
    @php
        $user=$book->find($book->id)->relUsers;
    @endphp

    Título: {{$book->title}}<br>
    Preço: {{$book->price}}<br>
    Autor: {{$user->name}}<br>
    E-mail do Autor: {{$user->email}}<br>
    
    
    </div>
@endsection