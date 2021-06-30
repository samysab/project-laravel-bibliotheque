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
                    <ul>
                        @foreach ($category as $categories)
                            <li> {{ $categories->name }}
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
