@extends('layouts/admin')

@section('title', 'Arcadia - Admin')

@section('content')

<main class="py-24 px-4 sm:pl-[255px]">
    <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
        Dashboard
    </h1>
    <div class="grid grid-cols-1 gap-4 ml-6 mt-10">
        @foreach ($dataHomes as $dataHome)
            <div>
                <h2 class="text-2xl font-bold font-title text-asparagus-500">{{ $dataHome['label'] }}</h2>
                <div class="relative overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Animal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre de visites
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataHome['animals'] as $animal)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $animal['name'] }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $animal['count'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
