@extends('layouts/admin')

@section('title', 'Arcadia - Admin Horaires')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Horaires
        </h1>
        <div class="mt-10 flex justify-end">
            <button
                type="button"
                data-modal-target="admin-hours-create-modal"
                data-modal-toggle="admin-hours-create-modal"
                class="focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Créer un nouveau horaire
            </button>
        </div>

        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Jours
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Heure d'ouverture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Heure de fermeture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hours as $hour)
                        <tr class="bg-armadillo-50 border-b  hover:bg-armadillo-100 ">
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $hour['day'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $hour['opening_time'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $hour['closing_time'] }}
                            </td>
                            <td id="csrf_row_{{ $hour['id'] }}" class="px-6 py-4 w-1/5">
                                @csrf
                                <button type="button"
                                    class="focus:outline-none text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    data-modal-target="admin-hours-update-modal-{{ $hour['id'] }}"
                                    data-modal-toggle="admin-hours-update-modal-{{ $hour['id'] }}"
                                >
                                    Modifier
                                </button>
                                <form action="{{ route('admin_hours_delete', ['hourId' => $hour['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="admin-hours-create-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative">
                    <div class="flex justify-end p-2">
                        <button type="button"
                            class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-toggle="admin-hours-create-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_hours_create') }}" method="POST">
                        @csrf
                        @include('partials.form.select', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Jour',
                            'name' => 'day',
                            'options' => $days,
                            'required' => true, 
                            'hasError' => !!$errors->first('day'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => "Heure d'ouverture",
                            'name' => 'opening_time',
                            'required' => true, 
                            'type' => 'time',
                            'value' => '00:00',
                            'hasError' => !!$errors->first('opening_time'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => "Heure de fermeture",
                            'name' => 'closing_time',
                            'required' => true, 
                            'type' => 'time',
                            'value' => '00:00',
                            'hasError' => !!$errors->first('closing_time'),
                        ])
                        <div class="flex justify-end">
                            <div class="flex items-start">
                                <button type="submit" id="admin_hours_create_button"
                                    class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($hours as $hour)
            <div id="admin-hours-update-modal-{{ $hour['id'] }}" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="admin-hours-update-modal-{{ $hour['id'] }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_hours_update', ['hourId' => $hour['id']]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('partials.form.select', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Jour',
                                'name' => 'day',
                                'options' => $days,
                                'required' => true, 
                                'value' => $hour['day'],
                                'hasError' => !!$errors->first('day'),
                            ])
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => "Heure d'ouverture",
                                'name' => 'opening_time',
                                'required' => true, 
                                'type' => 'time',
                                'value' => $hour['opening_time'],
                                'hasError' => !!$errors->first('opening_time'),
                            ])
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => "Heure de fermeture",
                                'name' => 'closing_time',
                                'required' => true, 
                                'type' => 'time',
                                'value' => $hour['closing_time'],
                                'hasError' => !!$errors->first('closing_time'),
                            ])
                            <div class="flex justify-end">
                                <div class="flex items-start">
                                    <button type="submit"
                                        data-id="{{ $hour['id'] }}"
                                        class="admin_hours_update_button w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
