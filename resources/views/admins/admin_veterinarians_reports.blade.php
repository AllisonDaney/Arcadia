@extends('layouts/admin')

@section('title', 'Arcadia - Admin Rapport vétérinaire')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Rapport vétérinaire
        </h1>
        <div class="mt-10 flex justify-end">
            <button
                type="button"
                data-modal-target="admin-veterinariansReports-create-modal"
                data-modal-toggle="admin-veterinariansReports-create-modal"
                class="focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Créer un nouveau rapport
            </button>
        </div>
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
                <form id="admin_veterinariansReports_create_form" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                    action="#">
                    @csrf
                    <div>
                        <label for="animal_id" class="text-sm font-medium text-armadillo-900 block mb-2 ">Animal</label>
                        <select id="animal_id" name="animal_id"
                        class="bg-gray-50 border border-gray-300 text-armadillo-900 text-sm rounded-lg focus:ring-armadillo-200 focus:border-asparagus-600 block w-full p-2.5 outline-asparagus-600 "required="">
                            @foreach($animals as $animal)
                                <option value="{{ $animal['id'] }}">{{ $animal['name'] }} ({{ isset($animal['home']) ? $animal['home']['label'] : 'Non renseigné' }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="animal_condition" class="text-sm font-medium text-armadillo-900 block mb-2 ">Condition</label>
                        <input name="animal_condition" id="animal_condition"
                            class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                            placeholder="Condition">
                    </div>
                    <div>
                        <label for="food" class="text-sm font-medium text-armadillo-900 block mb-2 ">Nouriture</label>
                        <input name="food" id="food"
                            class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                            placeholder="Nouriture">
                    </div>
                    <div>
                        <label for="food_quantity" class="text-sm font-medium text-armadillo-900 block mb-2 ">Quantité</label>
                        <input name="food_quantity" id="food_quantity" type="number"
                            class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                            placeholder="Quantité">
                    </div>
                    <div>
                        <label for="details" class="text-sm font-medium text-armadillo-900 block mb-2 ">Détail</label>
                        <textarea name="details" id="details"
                            class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                            placeholder="Détail"></textarea>
                    </div>
                    <div class="flex items-center w-full gap-4">
                        <div class="w-2/3">
                            <label for="visit_at_date"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Date</label>
                                <input name="visit_at_date" id="visit_at_date" type="date"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Date">
                        </div>
                        <div class="w-1/3">
                            <label for="visit_at_time"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Heure</label>
                                <input name="visit_at_time" id="visit_at_time" type="time"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Heure">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <div class="flex items-start">
                            <button type="submit" id="admin_veterinariansReports_create_button"
                                class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const submitButton = document.querySelector('#admin_veterinariansReports_create_button')

            submitButton.addEventListener('click', async (e) => {
                e.preventDefault()

                await fetch('/veterinarians_reports', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": document.querySelector(
                                '#admin_veterinariansReports_create_form input[name="_token"]')
                            .value
                    },
                    body: JSON.stringify({
                        animal_id: document.querySelector('#admin_veterinariansReports_create_form select[name="animal_id"]').value,
                        animal_condition: document.querySelector('#admin_veterinariansReports_create_form input[name="animal_condition"]').value,
                        food: document.querySelector('#admin_veterinariansReports_create_form input[name="food"]').value,
                        food_quantity: document.querySelector('#admin_veterinariansReports_create_form input[name="food_quantity"]').value,
                        details: document.querySelector('#admin_veterinariansReports_create_form textarea[name="details"]').value,
                        visit_at_date: document.querySelector('#admin_veterinariansReports_create_form input[name="visit_at_date"]').value,
                        visit_at_time: document.querySelector('#admin_veterinariansReports_create_form input[name="visit_at_time"]').value,
                    })
                });

                window.location.reload()
            })
        })
    </script>
@endsection
