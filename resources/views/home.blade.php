@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

    @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
    @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    You are logged in!
                </p>
            </div>
        </section>
        <!-- Creacion de un componente nativo -->
        <x-demo class="text-center mt-10" :demo="$demo">
            <div class="flex flex-col md:flex-row mx-auto">
                <div class="basis-1/4">
                    Nunc a nibh nec justo vulputate dapibus at nec dolor. Orci varius natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Phasellus finibus congue semper. Donec dolor
                    velit, bibendum vitae metus in, rutrum mattis eros. Pellentesque aliquet dui quis orci
                    bibendum fermentum.
                </div>
                <div class="basis-1/4">
                    Nunc a nibh nec justo vulputate dapibus at nec dolor. Orci varius natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Phasellus finibus congue semper. Donec dolor
                    velit, bibendum vitae metus in, rutrum mattis eros. Pellentesque aliquet dui quis orci
                    bibendum fermentum.
                </div>
                <div class="basis-1/2">
                    Nunc a nibh nec justo vulputate dapibus at nec dolor. Orci varius natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Phasellus finibus congue semper. Donec dolor
                    velit, bibendum vitae metus in, rutrum mattis eros. Pellentesque aliquet dui quis orci
                    bibendum fermentum.
                    Nunc a nibh nec justo vulputate dapibus at nec dolor. Orci varius natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Phasellus finibus congue semper. Donec dolor
                    velit, bibendum vitae metus in, rutrum mattis eros. Pellentesque aliquet dui quis orci
                    bibendum fermentum.
                </div>
            </div>
        </x-demo>
    </div>
</main>
@endsection
