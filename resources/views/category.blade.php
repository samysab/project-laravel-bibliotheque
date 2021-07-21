<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listes des catégories
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
                        <div style="color: red" class="alert alert-success">{{ $errors->first('description') }}</div>
                    @endif
                    @if ($errors->has('name'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('name') }}</div>
                    @endif
                    {!! Form::open(['route' => 'create-category']) !!}
                    <div class="form-group">
                    {!! Form::text('name') !!}

                        {!! Form::text('description') !!}

                    </div>
                        {!! Form::submit('Créer la categorie'); !!}
                    {!! Form::close() !!}
                    <ul>
                        @foreach ($category as $categories)
                            <li> {{ $categories->name }} {{ $categories->description }}
                                [<a href="{{ route('update', $categories->id) }}">update </a>]
                                [<a href="{{ route('delete-category', $categories->id) }}">delete </a>]
                              {{--  @if(isset($categories->genre))
                                    <i><b>({{$categories->genre->nom}}</b></i>)
                                @endif--}}
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    {{--                    {{ $films->links() }}--}}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
