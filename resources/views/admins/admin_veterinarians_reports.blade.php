@extends('layouts/admin')

@section('title', 'Arcadia - Admin Rapport vétérinaire')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Rapport vétérinaire
        </h1>
        <div class="mt-10 flex md:flex-row flex-col lg:flex-nowrap flex-wrap items-end justify-between gap-4">
            @if (in_array(Auth::user()->role->id, [3]))
                <div class="flex justify-end h-full w-full">
                    <button
                        type="button"
                        data-modal-target="admin-veterinariansReports-create-modal"
                        data-modal-toggle="admin-veterinariansReports-create-modal"
                        class="focus:outline-none text-white mb-1 bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-fit"
                    >
                        Créer un nouveau rapport
                    </button>
                </div>
            @endif
        </div>
        <form class="flex md:flex-row flex-col lg:flex-nowrap flex-wrap items-end justify-between gap-4" action="{{ route('admin_veterinarians_reports') }}" method="GET">
            <div class="sm:ml-4 md:flex-row flex-col md:flex-nowrap flex-wrap flex items-center gap-4 w-full">
                @include('partials.form.select', [
                    'class' => 'w-full',
                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                    'name' => 'animal_id',
                    'options' => $animals,
                    'itemValue' => 'id',
                    'itemLabel' => 'name',
                    'label' => 'Animal',
                    'value' => $filterAnimalId,
                    'placeholder' => '-- Sélectionner un animal --',
                ])
                @include('partials.form.input', [
                    'class' => 'w-full',
                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                    'name' => 'start_date',
                    'value' => $filterStartDate,
                    'type' => 'date',
                    'label' => 'Date de début',
                ])
                @include('partials.form.input', [
                    'class' => 'w-full',
                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                    'name' => 'end_date',
                    'value' => $filterEndDate,
                    'type' => 'date',
                    'label' => 'Date de fin',
                ])
            </div>
            <div class="flex justify-end h-full w-fit">
                <button
                    class="focus:outline-none text-white mb-1 bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-fit"
                >
                    Rechercher
                </button>
            </div>
        </form>
        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Vétérinaire
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Animal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Condition
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nouriture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Détail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date de visite
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veterinariansReports as $veterinariansReport)
                        <tr class="bg-armadillo-50 border-b hover:bg-armadillo-100 ">
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $veterinariansReport['user']['firstname'] }} {{ $veterinariansReport['user']['lastname'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $veterinariansReport['animal']['name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinariansReport['animal_condition'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinariansReport['food'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinariansReport['food_quantity'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinariansReport['details'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinariansReport['visit_at'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <div id="admin-veterinariansReports-create-modal" aria-hidden="true"
        class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                        data-modal-toggle="admin-veterinariansReports-create-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_veterinarians_reports_create') }}" method="POST">
                    @csrf
                    @include('partials.form.select', [
                        'class' => 'w-full',
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'label' => 'Animal',
                        'name' => 'animal_id',
                        'options' => $animals,
                        'itemValue' => 'id',
                        'itemLabel' => 'name',
                    ])
                    @include('partials.form.input', [
                        'class' => 'w-full',
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'label' => 'Condition',
                        'name' => 'animal_condition',
                        'required' => true, 
                        'hasError' => !!$errors->first('animal_condition'),
                    ])
                    @include('partials.form.input', [
                        'class' => 'w-full',
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'label' => 'Nourriture',
                        'name' => 'food',
                        'required' => true, 
                        'hasError' => !!$errors->first('food'),
                    ])
                    @include('partials.form.input', [
                        'class' => 'w-full',
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'label' => 'Quantité',
                        'name' => 'food_quantity',
                        'required' => true, 
                        'type' => 'number',
                        'hasError' => !!$errors->first('food_quantity'),
                    ])
                    @include('partials.form.textarea', [
                        'class' => 'w-full',
                        'label' => 'Détails',
                        'name' => 'details',
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'required' => true,
                        'rows' => 2,
                        'hasError' => !!$errors->first('details'),
                    ])
     adm         <div class="flex items-center w-full gap-4">
                        <div class="w-2/3">
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Date',
                                'name' => 'visit_at_date',
                                'required' => true, 
                                'type' => 'date',
                                'hasError' => !!$errors->first('visit_at_date'),
                            ])
                        </div>
                        <div class="w-1/3">
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Heure',
                                'name' => 'visit_at_time',
                                'required' => true, 
                                'type' => 'time',
                                'hasError' => !!$errors->first('visit_at_time'),
                            ])
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <div class="flex items-start">
                            <button
                                class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
