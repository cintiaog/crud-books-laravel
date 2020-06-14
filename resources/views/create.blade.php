@extends ('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($book))Editar @else Cadastro @endif</h1>
    <hr>
    
    <div class="col-12 m-auto">
    @if(isset($book))
    <form name="formEdit" id="formEdit" method="post" action="{{url('books/$id/edit')}}">
    @method ('PUT')
    @else
    <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
    @endif
            @csrf
            <input class="form-control" type="text" name="title" id="title" placeholder="Título:" required value="{{$book->title->id ?? ' '}}"><br>
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="{{$book->relUsers->id ?? ' '}}">{{$book->relUsers->name ?? 'Autor '}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
            <input class="form-control" type="text" name="price" id="price" placeholder="Preço:" required value="{{$book->price->id ?? ' '}}"><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($book))Editar @else Cadastro @endif">
        </form>
    
    </div>
    @if(isset($errors)&&count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach ($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach    
    @endif    

    </div>
@endsection