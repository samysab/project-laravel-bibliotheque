<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            The Wall
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Update post #{{$post->id}}</h1>
                    {!! Form::open(['route' => 'save']) !!}
                        {!! Form::text('content', $post->content) !!}
                        {!! Form::hidden('post_id', $post->id) !!}
                        {!! Form::submit('Modify my post'); !!}
                    {!! Form::close() !!}
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
