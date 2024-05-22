@extends('layouts/admin')

@section('title', 'Arcadia - Admin Animaux')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Animaux
        </h1>
        <div class="mt-10 flex justify-end">
            <button
                type="button"
                data-modal-target="admin-animals-create-modal"
                data-modal-toggle="admin-animals-create-modal"
                class="focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Créer un nouvel animal
            </button>
        </div>
        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Habitat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Race
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nouriture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animals as $animal)
                        <tr class="bg-armadillo-50 border-b  hover:bg-armadillo-100 ">
                            <td class="px-6 py-4">
                                @if (!count($animal['animalsPictures']))
                                    <img src="{{ asset('/img/notfound.png') }}" class="w-12 h-12">
                                @endif
                                @foreach ($animal['animalsPictures'] as $animalPicture)
                                    <img src="{{ asset(isset($animalPicture['url']) ? $animalPicture['url'] : '/img/notfound.png') }}" class="w-12 h-12" alt="" onerror="this.src = '/img/notfound.png'">
                                @endforeach
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $animal['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($animal['home']) ? $animal['home']['label'] : 'Non renseigné' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $animal['breed'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $animal['food'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $animal['food_quantity'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $animal['food_at'] }}
                            </td>
                            <td id="csrf_row_{{ $animal['id'] }}" class="px-6 py-4 w-1/5">
                                @csrf
                                <button type="button"
                                    class="focus:outline-none text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    data-modal-target="admin-animals-update-modal-{{ $animal['id'] }}"
                                    data-modal-toggle="admin-animals-update-modal-{{ $animal['id'] }}"
                                >
                                    Modifier
                                </button>
                                <button type="button" data-id="{{ $animal['id'] }}"
                                    class="admin_animals_delete_button focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="admin-animals-create-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-xl px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative">
                    <div class="flex justify-end p-2">
                        <button type="button"
                            class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-toggle="admin-animals-create-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form id="admin_animals_create_form" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                        action="#">
                        @csrf
                        <div>
                            <label for="name" class="text-sm font-medium text-armadillo-900 block mb-2 ">Nom</label>
                            <input name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                placeholder="Nom">
                        </div>
                        <div>
                            <label for="home_id" class="text-sm font-medium text-armadillo-900 block mb-2 ">Habitat</label>
                            <select id="home_id" name="home_id"
                            class="bg-gray-50 border border-gray-300 text-armadillo-900 text-sm rounded-lg focus:ring-armadillo-200 focus:border-asparagus-600 block w-full p-2.5 outline-asparagus-600 "required="">
                                @foreach($homes as $home)
                                    <option value="{{ $home['id'] }}">{{ $home['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="breed"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Race</label>
                                <input name="breed" id="breed"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Race">
                        </div>
                        <div>
                            <label for="food"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Nouriture</label>
                                <input name="food" id="food"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Nouriture">
                        </div>
                        <div>
                            <label for="food_quantity"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Quantité</label>
                                <input name="food_quantity" id="food_quantity" type="number"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Quantité">
                        </div>
                        <div class="flex items-center w-full gap-4">
                            <div class="w-2/3">
                                <label for="food_at_date"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Date</label>
                                    <input name="food_at_date" id="food_at_date" type="date"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                        placeholder="Date">
                            </div>
                            <div class="w-1/3">
                                <label for="food_at_time"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Heure</label>
                                    <input name="food_at_time" id="food_at_time" type="time"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                        placeholder="Date">
                            </div>
                        </div>
                        <div>
                            <label for="file"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Image(s)</label>
                            <input type="file" accept="image/png,image/jpeg,image/jpg" name="file" id="file"
                                class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                placeholder="image">
                        </div>
                        <div class="flex justify-end">
                            <div class="flex items-start">
                                <button type="submit" id="admin_animals_create_button"
                                    class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($animals as $animal)
            <div id="admin-animals-update-modal-{{ $animal['id'] }}" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="admin-animals-update-modal-{{ $animal['id'] }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form id="admin_animals_update_form-{{ $animal['id'] }}" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                            action="#">
                            @csrf
                            <div>
                                <label for="name" class="text-sm font-medium text-armadillo-900 block mb-2 ">Nom</label>
                                <input name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Nom" value="{{ $animal['name'] }}">
                            </div>
                            <div>
                                <label for="home_id" class="text-sm font-medium text-armadillo-900 block mb-2 ">Habitat</label>
                                <select id="home_id" name="home_id"
                                class="bg-gray-50 border border-gray-300 text-armadillo-900 text-sm rounded-lg focus:ring-armadillo-200 focus:border-asparagus-600 block w-full p-2.5 outline-asparagus-600 "required="">
                                    @foreach($homes as $home)
                                        <option value="{{ $home['id'] }}" {{ $animal['home_id'] === $home['id'] ? 'selected' : '' }}>{{ $home['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="breed"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Race</label>
                                    <input name="breed" id="breed"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                        placeholder="Race" value="{{ $animal['breed'] }}">
                            </div>
                            <div>
                                <label for="food"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Nouriture</label>
                                    <input name="food" id="food"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                        placeholder="Nouriture" value="{{ $animal['food'] }}">
                            </div>
                            <div>
                                <label for="food_quantity"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Quantité</label>
                                    <input name="food_quantity" id="food_quantity" type="number"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                        placeholder="Quantité" value="{{ $animal['food_quantity'] }}">
                            </div>
                            <div class="flex items-center w-full gap-4">
                                <div class="w-2/3">
                                    <label for="food_at_date"
                                        class="text-sm font-medium text-armadillo-900 block mb-2 ">Date</label>
                                        <input name="food_at_date" id="food_at_date" type="date"
                                            class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                            placeholder="Date" value="{{ isset($animal['food_at']) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $animal['food_at'])->format('Y-m-d') : date('Y-m-d') }}">
                                </div>
                                <div class="w-1/3">
                                    <label for="food_at_time"
                                        class="text-sm font-medium text-armadillo-900 block mb-2 ">Heure</label>
                                        <input name="food_at_time" id="food_at_time" type="time"
                                            class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                            placeholder="Heure" value="{{ isset($animal['food_at']) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $animal['food_at'])->format('H:i') : date('H:i') }}">
                                </div>
                            </div>
                            <div>
                                <label for="file"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Image(s)</label>
                                <input type="file" accept="image/png,image/jpeg,image/jpg" name="file" id="file"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="image">
                            </div>
                            <div class="flex justify-end">
                                <div class="flex items-start">
                                    <button type="submit"
                                        data-id="{{ $animal['id'] }}"
                                        class="admin_animals_update_button w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </main>

    <script>
        window.addEventListener('load', function() {
            const submitButton = document.querySelector('#admin_animals_create_button')

            submitButton.addEventListener('click', async (e) => {
                e.preventDefault()

                const formData = new FormData()

                formData.append('file', document.querySelector(
                    '#admin_animals_create_form input[name="file"]').files[0])
                formData.append('data', JSON.stringify({
                    name: document.querySelector(
                        '#admin_animals_create_form input[name="name"]').value,
                    home_id: document.querySelector(
                        '#admin_animals_create_form select[name="home_id"]').value,
                    breed: document.querySelector(
                        '#admin_animals_create_form input[name="breed"]').value,
                    food: document.querySelector(
                        '#admin_animals_create_form input[name="food"]').value,
                    food_quantity: document.querySelector(
                        '#admin_animals_create_form input[name="food_quantity"]').value,
                    food_at_date: document.querySelector(
                        '#admin_animals_create_form input[name="food_at_date"]').value,
                    food_at_time: document.querySelector(
                        '#admin_animals_create_form input[name="food_at_time"]').value,
                }))

                const rawResponse = await fetch('/animals', {
                    method: 'POST',
                    headers: {
                        "X-CSRF-Token": document.querySelector(
                                '#admin_animals_create_form input[name="_token"]')
                            .value
                    },
                    body: formData
                });

                await rawResponse.json();

                window.location.reload()
            })

            const deleteButtons = document.querySelectorAll('.admin_animals_delete_button')

            for (let button of deleteButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const animalId = button.getAttribute('data-id')

                    await fetch(`/animals/${animalId}`, {
                        headers: {
                            "X-CSRF-Token": document.querySelector(`#csrf_row_${animalId} input[name="_token"]`).value
                        },
                        method: 'DELETE',
                    });

                    window.location.reload()
                })
            }

            const updateButtons = document.querySelectorAll('.admin_animals_update_button')

            for (let button of updateButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const animalId = button.getAttribute('data-id')

                    await fetch(`/animals/${animalId}`, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": document.querySelector(`#admin_animals_update_form-${animalId} input[name="_token"]`)?.value
                        },
                        method: 'PUT',
                        body: JSON.stringify({
                            name: document.querySelector(
                                `#admin_animals_update_form-${animalId} input[name="name"]`).value,
                            home_id: document.querySelector(
                                `#admin_animals_update_form-${animalId} select[name="home_id"]`).value,
                            breed: document.querySelector(
                                `#admin_animals_update_form-${animalId} input[name="breed"]`).value,
                            food: document.querySelector(
                                `#admin_animals_update_form-${animalId} input[name="food"]`).value,
                            food_quantity: document.querySelector(
                                `#admin_animals_update_form-${animalId} input[name="food_quantity"]`).value,
                            food_at_date: document.querySelector(
                                `#admin_animals_update_form-${animalId} input[name="food_at_date"]`).value,
                            food_at_time: document.querySelector(
                                `#admin_animals_update_form-${animalId} input[name="food_at_time"]`).value,
                        })
                    });

                    const file = document.querySelector(
                        `#admin_animals_update_form-${animalId} input[name="file"]`).files[0]

                    if (file) {
                        const formData = new FormData()
                        formData.append('file', file)

                        const r = await fetch(`/animals/${animalId}/image`, {
                            method: 'POST',
                            headers: {
                                "X-CSRF-Token": document.querySelector(`#admin_animals_update_form-${animalId} input[name="_token"]`)?.value
                            },
                            body: formData
                        });
                    }

                    window.location.reload()
                })
            }
        })
    </script>
@endsection
