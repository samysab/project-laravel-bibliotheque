<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            The Wall
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
                    <h1>Welcome on the wall</h1>
                    {!! Form::open(['route' => 'post']) !!}
                        {!! Form::text('content') !!}
{{--                        {!! Form::text('contents') !!}--}}
                    {!! Form::submit('Post on the wall!'); !!}
                    {!! Form::close() !!}
                    <br><br>
                    <ul>
                        @foreach ($posts as $post)
                            <li> {{ $post->content }} (<i>by <b>{{$post->user->name}}</b></i>)
                            [<a href="{{ route('update', $post->id) }}">update </a>]
                            [<a href="{{ route('delete', $post->id) }}">delete </a>]
                            </li>
                        @endforeach
                    </ul>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
