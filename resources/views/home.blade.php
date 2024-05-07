@extends('layouts/default')

@section('title', 'Arcadia - Habitat')

@section('content')
    <main>
        <section class="mb-36 mt-32">
            <h1 class="text-5xl font-bold text-center font-title text-asparagus-500">
                Nos habitats<br><br>
            </h1>
            {{-- presentation des habitats --}}
            <section class="relative">
                <div class="w-full max-w-2xl lg:max-w-7xl px-6 lg:px-8 mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($homes as $home)
                            <a href="{{ route('home_show', ['homeId' => $home['id']]) }}"
                                class="flex items-center flex-col gap-8 w-full group cursor-pointer ">
                                <img src="{{ asset($home['homePictures'][0]['url']) }}" class="w-full rounded-xl"
                                    alt="logo arcadia">
                                <div
                                    class="  flex items-center justify-end gap-20 max-w-[406px] lg:max-w-full w-full lg:px-0">
                                    <h4 class="text-2xl font-manrope font-semibold text-gray-900 mb-1">
                                        {{ $home['label'] }}
                                    </h4>
                                    <div
                                        class=" border border-asparagus-500 py-2 px-3.5 rounded-full transition-all duration-300 group-hover:bg-asparagus-500">
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
                </div>
            </section>
        </section>
    </main>
@endsection
