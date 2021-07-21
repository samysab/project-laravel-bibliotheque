<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inscription
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
                    {!! Form::open(['route' => 'create-user']) !!}
                    {!! Form::text('name') !!}
                    {!! Form::email('email') !!}
                    {!! Form::password('password') !!}
                    {!! Form::password('password_confirmation') !!}
                    {!! Form::number('isAuthor') !!}
                    {!! Form::submit('Créer un utilisateur'); !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
