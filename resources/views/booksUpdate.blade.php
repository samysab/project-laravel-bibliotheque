<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification du livre
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
                    <h1>Modification du livre</h1>
                    {!! Form::open(['route' => 'saveBook']) !!}
                        {!! Form::text('name', $book->name) !!}
                        {!! Form::textarea('description', $book->description) !!}
                        {!! Form::select('category', $categoryName) !!}
                    {!! Form::submit('Ajouter'); !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
