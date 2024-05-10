@extends('layouts/default')

@section('title', 'Arcadia - Habitat')

@section('content')
    <main class="container mx-auto py-20 px-4">
        <h1 class="text-5xl font-bold text-center font-title text-asparagus-500">
            Nos habitats
        </h1>

        <div class="w-full flex items-center justify-center gap-16 mt-20 flex-wrap">
            @foreach ($homes as $home)
                <a href="{{ route('home_show', ['homeId' => $home['id']]) }}" class="group">
                    <img src="{{ asset($home['homePictures'][0]['url']) }}" class="w-60 rounded-xl mx-auto" alt="logo arcadia">
                    <div class="flex mt-4 justify-between items-center">
                        <h4 class="text-2xl font-manrope font-semibold text-gray-900 mx-auto">{{ $home['label'] }}</h4>
                        <div class="flex items-center border border-asparagus-500 p-2 px-3.5 rounded-full transition-all duration-300 group-hover:bg-asparagus-500">
                            <svg class="stroke-asparagus-500 transition-all duration-300 group-hover:stroke-white"
                                xmlns="http://www.w3.org/2000/svg" width="17" height="16"
                                viewBox="0 0 17 16" fill="none">
                                <path
                                    d="M9.62553 4L13.6664 8.0409M13.6664 8.0409L9.62553 12.0818M13.6664 8.0409L1.6665 8.0409"
                                    stroke="" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection
