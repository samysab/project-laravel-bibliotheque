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
                    <h1>Update post #{{$category->id}}</h1>
                    {!! Form::open(['route' => 'save']) !!}
                        {!! Form::text('name', $category->name) !!}
                        {!! Form::text('description', $category->description) !!}
                        {!! Form::hidden('category_id', $category->id) !!}
                        {!! Form::submit('Modify my category'); !!}
                    {!! Form::close() !!}
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
