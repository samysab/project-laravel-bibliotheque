<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/mes-livres') }}" class="text-sm text-gray-700 underline">Mes livres</a>
                <a href="{{ url('/logoutUser') }}" class="text-sm text-gray-700 underline">Déconnexion</a>

            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    @if (session('status'))
                        <div style="color: green" class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h1 class="">Library</h1>
                        <ul>
                            @foreach ($books as $book)
                                <img width="200px" src="{{asset('storage/images').'/'.$book->path}}">
                                <li> {{ $book->name }}</li>
                                <a href="/livre/{{ $book->id }}">Voir les commentaires</a><br><br>
                                @if(  \Illuminate\Support\Facades\Auth::user() && !$book->buyed() )
                                {!! Form::open(['route' => 'saveBookUser']) !!}
                                {!! Form::hidden('book_id',$book->id); !!}
                                {!! Form::submit('Acheter'); !!}
                                {!! Form::close() !!}
                                    <br>



                                @endif
                            @endforeach
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

