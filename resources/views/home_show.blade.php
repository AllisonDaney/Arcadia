@extends('layouts/default')

@section('title', 'Arcadia - Habitat - ' . $home['label'])

@section('content')
    <main class="container mx-auto py-20 px-4">
        <h1 class="text-5xl font-bold text-center font-title text-asparagus-500">
            {{ $home['label'] }}
        </h1>
        <p class="text-center text-armadillo-900 max-w-2xl mx-auto mt-12 leading-8">
            {{ $home['content'] }}
        </p>
        <h2 class="font-title text-3xl text-center font-semibold text-asparagus-500 mt-32">Nos animaux</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-14 gap-8">
            @foreach ($home['animals'] as $animal)
                <div
                    class="cursor-pointer group"
                    data-drawer-target="drawer-animal-{{ $animal['id'] }}"
                    data-drawer-show="drawer-animal-{{ $animal['id'] }}"
                    data-drawer-placement="right"
                    aria-controls="drawer-animal-{{ $animal['id'] }}"
                >
                    <img src="{{ asset($animal['animalsPictures'][0]['url']) }}" class="w-60 rounded-full mx-auto" alt="logo arcadia">
                    <p class="text-xl group-hover:text-asparagus-500 mb-2 text-center mt-4">{{ $animal['name'] }}</p>
                </div>
            @endforeach
        </div>

        @foreach ($home['animals'] as $animal)
            <div id="drawer-animal-{{ $animal['id'] }}" tabindex="-1" aria-labelledby="drawer-right-label" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-full sm:w-drawer">
                <button type="button" data-drawer-hide="drawer-animal-{{ $animal['id'] }}"
                    aria-controls="drawer-animal-{{ $animal['id'] }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>

                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row mt-16">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                        src="{{ asset($animal['animalsPictures'][0]['url']) }}" alt="">
                    <div class="flex gap-3 flex-col justify-between p-4 leading-normal w-full">
                        <h4 class="text-center"> Carte d'identité<br></h4>
                        <p class="text-asparagus-500">
                            Prénom: <span class="text-armadillo-900">{{ $animal['name'] }}</span>
                        </p>
                        <p class="text-asparagus-500">
                            Race: <span class="text-armadillo-900">{{ $animal['breed'] }}</span>
                        </p>
                        <p class="text-asparagus-500">
                            Habitat: <span class="text-armadillo-900">{{ $home['label'] }}</span>
                        </p>
                    </div>
                </div>

                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row mt-16">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('img/veterinaire.jpeg') }}" alt="">
                    <div class="flex flex-col gap-3 justify-between p-4 leading-normal w-full">
                        <h4 class="text-center"> Carnet de santé<br></h4>

                        @if (isset($animal['veterinariansReports']) && count($animal['veterinariansReports']))
                            <p class="text-asparagus-500">
                                Etat de santé: <span
                                    class="text-armadillo-900">{{ $animal['veterinariansReports'][0]['animal_condition'] }}</span>
                            </p>
                            <p class="text-asparagus-500">
                                Détails: <span
                                    class="text-armadillo-900">{{ $animal['veterinariansReports'][0]['details'] }}</span>
                            </p>
                            <p class="text-asparagus-500">
                                Nourriture donnée: <span
                                    class="text-armadillo-900">{{ $animal['veterinariansReports'][0]['food'] }}</span>
                            </p>
                            <p class="text-asparagus-500">
                                Grammage donné: <span
                                    class="text-armadillo-900">{{ $animal['veterinariansReports'][0]['food_weight'] }}</span>
                            </p>
                            <p class="text-asparagus-500">
                                Date de dernière visite: <span
                                    class="text-armadillo-900">{{ $animal['veterinariansReports'][0]['visit_at'] }}</span>
                            </p>
                            <p class="text-asparagus-500">
                                {{-- Vétérinaire: <span class="text-armadillo-900">{{ $animal["veterinariansReports"][0]["animal_condition"] }}</span> --}}
                            </p>
                        @else
                            <div id="alert-border-1"
                                class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50"
                                role="alert">
                                <span class="font-medium text-center w-full"> Infos vétérinaire non disponible</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
