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

                        <h1 class="">Mes livres</h1>
                        <ul>
                            @foreach ($books as $book)

                                <li> {{ $book->book->name }} | acheté le {{ $book->created_at }} </li>
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

