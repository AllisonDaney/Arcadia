@extends('layouts/default')

@section('title', 'Arcadia - Services')

@section('content')
    <main class="container mx-auto py-20 px-4">
        <h1 class="text-5xl font-bold text-center font-title text-asparagus-500">
            Nos services
        </h1>

        <div class="flex justify-center flex-wrap mt-14 gap-16">
            @foreach ($services as $service)
                <div
                    class="flex items-center flex-col gap-8 group cursor-pointer border-gray-400 shadow w-96"
                    data-drawer-target="drawer-service-{{ $service['id'] }}"
                    data-drawer-show="drawer-service-{{ $service['id'] }}"
                    data-drawer-placement="right"
                    aria-controls="drawer-service-{{ $service['id'] }}"
                >
                    <img class="rounded-t-lg h-[373px]" src="{{ asset($service['url']) }}" />
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-asparagus-500 text-center  ">
                            {{ $service['label'] }} <br></h5>
                        <p class="mb-3 font-normal text-armadillo-900 px-4">{{ $service['content'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach ($services as $service)
            <div id="drawer-service-{{ $service['id'] }}" tabindex="-1" aria-labelledby="drawer-right-label" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-full sm:w-drawer">
                <button type="button" data-drawer-hide="drawer-service-{{ $service['id'] }}"
                    aria-controls="drawer-service-{{ $service['id'] }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>

                @foreach (json_decode($service['options']) as $optionName => $option)
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  mt-10">
                    <div class="flex gap-3 flex-col justify-between p-4 leading-normal w-full">
                        <h4 class="text-center text-asparagus-500">{{ $optionName }}<br></h4>
                        <p class="text-armadillo-900">
                            {{ $option }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    </main>
@endsection
