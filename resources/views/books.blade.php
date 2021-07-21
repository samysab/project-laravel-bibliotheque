<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des livres
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('status'))
                    <div style="color: green" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->has('description'))
                        <br><div style="color: red" class="alert alert-success">{{ $errors->first('description') }}</div>
                    @endif
                    @if ($errors->has('name'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('name') }}</div>
                    @endif
                    @if ($errors->has('image'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('image') }}</div>
                    @endif
                    <h1>Gestion des livres</h1>
                    {!! Form::open(['route' => 'saveBook','files' => true, 'enctype' => 'multipart/form-data'], '') !!}
                        {!! Form::label('Nom') !!}
                        {!! Form::text('name') !!}
                        <br>
                        {!! Form::label('Description') !!}
                        {!! Form::textarea('description') !!}
                        <br>
                        {!! Form::label('Catégorie') !!}
                        {!! Form::select('category', $categoryName) !!}
                        <br>
                        {!! Form::label('Image') !!}
                        {!! Form::file('image') !!}
                        <br>
                        {!! Form::submit('Ajouter'); !!}
                    {!! Form::close() !!}
                    <br><br>
                    <ul>
                        @foreach ($books as $book)
                            <br>
                            @if(!empty($book->path))
                            <img width="200px" src="{{asset('storage/images').'/'.$book->path}}">
                            @endif
                            <li> {{ $book->name }}</b></i>
                            <li> {{ $book->description }}</b></i>
                            [<a href="{{ route('updateDisplayBook', $book->id) }}">Modifier </a>]
                            [<a href="{{ route('deleteBook', $book->id) }} }}">Supprimer </a>]
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
