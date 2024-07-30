@extends('layouts/admin')

@section('title', 'Arcadia - Admin Habitats')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Habitats
        </h1>
        <div class="mt-10 flex justify-end">
            <button
                type="button"
                data-modal-target="admin-homes-create-modal"
                data-modal-toggle="admin-homes-create-modal"
                class="focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Créer un nouvel habitat
            </button>
        </div>
        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom de l'habitat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($homes as $home)
                        <tr class="bg-armadillo-50 border-b  hover:bg-armadillo-100 ">
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $home['label'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $home['content'] }}
                            </td>
                            <td class="flex flex-col gap-4 px-6 py-4">
                                @if (!count($home['homePictures']))
                                    <img src="{{ asset('/img/notfound.png') }}" class="w-12 h-12">
                                @endif
                                @foreach ($home['homePictures'] as $homePicture)
                                    <img src="{{ asset(isset($homePicture['url']) ? $homePicture['url'] : '/img/notfound.png') }}" class="w-12 h-12" alt="" onerror="this.src = '/img/notfound.png'">
                                @endforeach
                            </td>
                            <td id="csrf_row_{{ $home['id'] }}" class="px-6 py-4 w-1/5">
                                @csrf
                                <button type="button"
                                    class="focus:outline-none text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    data-modal-target="admin-homes-update-modal-{{ $home['id'] }}"
                                    data-modal-toggle="admin-homes-update-modal-{{ $home['id'] }}"
                                >
                                    Modifier
                                </button>
                                <form action="{{ route('admin_homes_delete', ['homeId' => $home['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="admin-homes-create-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative">
                    <div class="flex justify-end p-2">
                        <button type="button"
                            class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-toggle="admin-homes-create-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_homes_create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Nom',
                            'name' => 'label',
                            'required' => true, 
                            'hasError' => !!$errors->first('label'),
                        ])
                        @include('partials.form.textarea', [
                            'class' => 'w-full',
                            'label' => 'Description',
                            'name' => 'content',
                            'required' => true,
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'hasError' => !!$errors->first('content'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Image',
                            'name' => 'file',
                            'type' => 'file',
                            'accept' => 'image/png,image/jpeg,image/jpg',
                        ])
                        @include('partials.form.select', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Animaux',
                            'name' => 'animals[]',
                            'options' => $animals,
                            'multiple' => true,
                            'itemValue' => 'id',
                            'itemLabel' => 'name',
                        ])
                        <div class="flex justify-end">
                            <div class="flex items-start">
                                <button class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($homes as $home)
            <div id="admin-homes-update-modal-{{ $home['id'] }}" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="admin-homes-update-modal-{{ $home['id'] }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                            action="{{ route('admin_homes_update', ['homeId' => $home['id']]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Nom',
                                'name' => 'label',
                                'required' => true,
                                'value' => $home['label'],
                                'hasError' => !!$errors->first('label'),
                            ])
                            @include('partials.form.textarea', [
                                'class' => 'w-full',
                                'label' => 'Description',
                                'name' => 'content',
                                'required' => true,
                                'value' => $home['content'],
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'hasError' => !!$errors->first('content'),
                            ])
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Image',
                                'name' => 'file',
                                'type' => 'file',
                                'accept' => 'image/png,image/jpeg,image/jpg',
                            ])
                            @php
                                $animalIds = $home['animals']->map(function ($animal) {
                                    return $animal['id'];
                                });
                            @endphp
                            @include('partials.form.select', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Animaux',
                                'name' => 'animals[]',
                                'options' => $animals,
                                'multiple' => true,
                                'itemValue' => 'id',
                                'itemLabel' => 'name',
                                'value' => $animalIds->toArray(),
                            ])
                            <div class="flex justify-end">
                                <div class="flex items-start">
                                    <button type="submit"
                                        data-id="{{ $home['id'] }}"
                                        class="admin_homes_update_button w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </main>

    <!-- <script>
        window.addEventListener('load', function() {
            const submitButton = document.querySelector('#admin_homes_create_button')

            submitButton.addEventListener('click', async (e) => {
                e.preventDefault()

                const animalsEl = document.querySelector('#admin_homes_create_form select[name="animals"]').selectedOptions
                const animalValues = Array.from(animalsEl).map(({ value }) => value);

                const formData = new FormData()
                formData.append('file', document.querySelector(
                    '#admin_homes_create_form input[name="file"]').files[0])
                formData.append('data', JSON.stringify({
                    label: document.querySelector(
                        '#admin_homes_create_form input[name="label"]').value,
                    content: document.querySelector(
                        '#admin_homes_create_form textarea[name="content"]').value,
                    animalIds: animalValues
                }))

                const rawResponse = await fetch('/homes', {
                    method: 'POST',
                    headers: {
                        "X-CSRF-Token": document.querySelector(
                                '#admin_homes_create_form input[name="_token"]')
                            .value
                    },
                    body: formData
                });

                await rawResponse.json();

                window.location.reload()
            })

            const deleteButtons = document.querySelectorAll('.admin_homes_delete_button')

            for (let button of deleteButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const homeId = button.getAttribute('data-id')

                    const rawResponse = await fetch(`/homes/${homeId}`, {
                        headers: {
                            "X-CSRF-Token": document.querySelector(
                                    `#csrf_row_${homeId} input[name="_token"]`)
                                .value
                        },
                        method: 'DELETE',
                    });

                    await rawResponse.json();

                    window.location.reload()
                })
            }

            const updateButtons = document.querySelectorAll('.admin_homes_update_button')

            for (let button of updateButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const homeId = button.getAttribute('data-id')
                    const animalsEl = document.querySelector(`#admin_homes_update_form-${homeId} select[name="animals"]`).selectedOptions
                    const animalValues = Array.from(animalsEl).map(({ value }) => value);

                    await fetch(`/homes/${homeId}`, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": document.querySelector(`#admin_homes_update_form-${homeId} input[name="_token"]`)?.value
                        },
                        method: 'PUT',
                        body: JSON.stringify({
                            label: document.querySelector(
                                `#admin_homes_update_form-${homeId} input[name="label"]`).value,
                            content: document.querySelector(
                                `#admin_homes_update_form-${homeId} textarea[name="content"]`).value,
                            animalIds: animalValues
                        })
                    });

                    const file = document.querySelector(
                        `#admin_homes_update_form-${homeId} input[name="file"]`).files[0]

                    if (file) {
                        const formData = new FormData()
                        formData.append('file', file)

                        await fetch(`/homes/${homeId}/image`, {
                            method: 'POST',
                            headers: {
                                "X-CSRF-Token": document.querySelector(`#admin_homes_update_form-${homeId} input[name="_token"]`)?.value
                            },
                            body: formData
                        });
                    }

                    window.location.reload()
                })
            }
        })
    </script> -->
@endsection
