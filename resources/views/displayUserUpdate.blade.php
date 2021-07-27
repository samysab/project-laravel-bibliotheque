<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inscription
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    @if ($errors->has('name'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('name') }}</div>
                    @endif

                    @if ($errors->has('password'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('password') }}</div>
                    @endif

                    @if ($errors->has('email'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('email') }}</div>
                    @endif

                    @if ($errors->has('old_password'))
                        <div style="color: red" class="alert alert-success">{{ $errors->first('old_password') }}</div>
                    @endif

                        <div style="color: red" class="alert alert-">@include('flash::message')</div>

                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => ['update-user', $user->id ]]) !!}
                    {!! Form::text('name', $user->name) !!}
                    {!! Form::email('email', $user->email) !!}
                    {!! Form::password('old_password', array(
                        'class' => '',
                        'id' => '',
                        'placeholder' => 'old password',
                        ))
                    !!}
                    {!! Form::password('password', array(
                        'class' => '',
                        'id' => '',
                        'placeholder' => 'new password',
                        ))
                    !!}
                    {!! Form::password('password_confirmation', array(
                        'class' => '',
                        'id' => '',
                        'placeholder' => 'password_confirmation',
                        ))
                    !!}
                    {!! Form::submit('Modifier un utilisateur'); !!}
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
