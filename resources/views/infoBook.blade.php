<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
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

                    <div style="text-align: center">
                        <p>Livre : {{ $book->name }}</p>

                        @if(isset($book->path))
                            <img src="{{Storage::url($book->image->path)}}">
                        @endif

                        @if(isset($book->content))
                        <p>Description : {{ $book->content }}</p>
                        @endif

                    </div>


                    @if(Auth::user())

                    {!! Form::open(['route' => 'create-comment']) !!}
                    {!! Form::hidden('book_id', $id ) !!}
                    {!! Form::text('content') !!}
                    {!! Form::submit('Je commente'); !!}
                    {!! Form::close() !!}
                    @endif

                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            @foreach ($comments as $comment)
                                <li> {{ $comment->content }}</li>
                                <p><i> Publié par : </i>{{ $comment->user->name }} à <i>{{ $comment->created_at }}</i>

                                    @if(Auth::user() && $comment->user->id == Auth::user()->id  )
                                        [<a href="{{ route('deleteComment', $comment->id) }}">delete </a>]
                                    @endif
                                </p>
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

