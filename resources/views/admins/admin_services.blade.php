@extends('layouts/admin')

@section('title', 'Arcadia - Admin Services')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Services
        </h1>
        <div class="mt-10 flex justify-end">
            <button
                type="button"
                data-modal-target="admin-services-create-modal"
                data-modal-toggle="admin-services-create-modal"
                class="focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Créer un nouveau service
            </button>
        </div>

        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Options
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Images
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr class="bg-armadillo-50 border-b  hover:bg-armadillo-100 ">
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $service['label'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $service['content'] }}
                            </td>
                            <td class="px-6 py-4">
                                <ul>
                                    @foreach (json_decode($service['options']) as $option)
                                        <li class="line-clamp-1">- {{ $option }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset($service['url']) }}" class="w-12 h-12">
                            </td>
                            <td id="csrf_row_{{ $service['id'] }}" class="px-6 py-4 w-1/5">
                                @csrf
                                <button type="button"
                                    class="focus:outline-none text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    data-modal-target="admin-services-update-modal-{{ $service['id'] }}"
                                    data-modal-toggle="admin-services-update-modal-{{ $service['id'] }}"
                                >
                                    Modifier
                                </button>
                                <button type="button" data-id="{{ $service['id'] }}"
                                    class="admin_services_delete_button focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="admin-services-create-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-5xl px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative">
                    <div class="flex justify-end p-2">
                        <button type="button"
                            class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-toggle="admin-services-create-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form id="admin_services_create_form" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                        action="#">
                        @csrf
                        <div>
                            <label for="label" class="text-sm font-medium text-armadillo-900 block mb-2 ">Nom</label>
                            <input name="label" id="label"
                                class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                placeholder="Nom">
                        </div>
                        <div>
                            <label for="description"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Description</label>
                            <textarea name="content" id="content"
                                class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                placeholder="Description"rows="4"></textarea>
                        </div>
                        <div>
                            <label for="file"
                                class="text-sm font-medium text-armadillo-900 block mb-2 ">Image(s)</label>
                            <input type="file" accept="image/png,image/jpeg,image/jpg" name="file" id="file"
                                class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                placeholder="image">
                        </div>
                        <div class="flex gap-4">
                            <div class="w-2/5">
                                <label for="title1" class="text-sm font-medium text-armadillo-900 block mb-2">Titre 1</label>
                                <input name="title1" id="title1" placeholder="Titre 1"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">
                            </div>
                            <div class="w-full">
                                <label for="content1" class="text-sm font-medium text-armadillo-900 block mb-2">Contenu 1</label>
                                <textarea name="content1" id="content1" placeholder="Contenu 1" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"></textarea>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-2/5">
                                <label for="title2" class="text-sm font-medium text-armadillo-900 block mb-2">Titre 2</label>
                                <input name="title2" id="title2" placeholder="Titre 2"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">
                            </div>
                            <div class="w-full">
                                <label for="content2" class="text-sm font-medium text-armadillo-900 block mb-2">Contenu 2</label>
                                <textarea name="content2" id="content2" placeholder="Contenu 2" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"></textarea>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-2/5">
                                <label for="title3" class="text-sm font-medium text-armadillo-900 block mb-3">Titre 3</label>
                                <input name="title3" id="title3" placeholder="Titre 3"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-3.5">
                            </div>
                            <div class="w-full">
                                <label for="content3" class="text-sm font-medium text-armadillo-900 block mb-3">Contenu 3</label>
                                <textarea name="content3" id="content3" placeholder="Contenu 3" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"></textarea>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-2/5">
                                <label for="title4" class="text-sm font-medium text-armadillo-900 block mb-2">Titre 4</label>
                                <input name="title4" id="title4" placeholder="Titre 4"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">
                            </div>
                            <div class="w-full">
                                <label for="content4" class="text-sm font-medium text-armadillo-900 block mb-2">Contenu 4</label>
                                <textarea name="content4" id="content4" placeholder="Contenu 4" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="flex items-start">
                                <button type="submit" id="admin_services_create_button"
                                    class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($services as $service)
            <div id="admin-services-update-modal-{{ $service['id'] }}" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-5xl px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="admin-services-update-modal-{{ $service['id'] }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form id="admin_services_update_form-{{ $service['id'] }}" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                            action="#">
                            @csrf
                            <div>
                                <label for="label" class="text-sm font-medium text-armadillo-900 block mb-2 ">Nom</label>
                                <input name="label" id="label"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Nom" value="{{ $service['label'] }}">
                            </div>
                            <div>
                                <label for="description"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Description</label>
                                <textarea name="content" id="content"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="Description"rows="4">{{ $service['content'] }}</textarea>
                            </div>
                            <div>
                                <label for="file"
                                    class="text-sm font-medium text-armadillo-900 block mb-2 ">Image(s)</label>
                                <input type="file" accept="image/png,image/jpeg,image/jpg" name="file" id="file"
                                    class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full p-2.5 outline-asparagus-600"
                                    placeholder="image">
                            </div>
                            @php
                                $options = [];
                                foreach(json_decode($service['options'], true) as $title => $content) {
                                    $options[] = [
                                        'title' => $title,
                                        'content' => $content,
                                    ];
                                }
                            @endphp
                            <div class="flex gap-4">
                                <div class="w-2/5">
                                    <label for="title1" class="text-sm font-medium text-armadillo-900 block mb-2">Titre 1</label>
                                    <input name="title1" id="title1" placeholder="Titre 1"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"
                                        value="{{ isset($options[0]) ? $options[0]['title'] : '' }}"
                                    >
                                </div>
                                <div class="w-full">
                                    <label for="content1" class="text-sm font-medium text-armadillo-900 block mb-2">Contenu 1</label>
                                    <textarea name="content1" id="content1" placeholder="Contenu 1" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">{{ isset($options[0]) ? $options[0]['content']  : '' }}</textarea>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-2/5">
                                    <label for="title2" class="text-sm font-medium text-armadillo-900 block mb-2">Titre 2</label>
                                    <input name="title2" id="title2" placeholder="Titre 2"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"
                                        value="{{ isset($options[1]) ? $options[1]['title'] : '' }}"
                                    >
                                </div>
                                <div class="w-full">
                                    <label for="content2" class="text-sm font-medium text-armadillo-900 block mb-2">Contenu 2</label>
                                    <textarea name="content2" id="content2" placeholder="Contenu 2" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">{{ isset($options[1]) ? $options[1]['content']  : '' }}</textarea>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-2/5">
                                    <label for="title3" class="text-sm font-medium text-armadillo-900 block mb-3">Titre 3</label>
                                    <input name="title3" id="title3" placeholder="Titre 3"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-3.5"
                                        value="{{ isset($options[2]) ? $options[2]['title'] : '' }}"
                                    >
                                </div>
                                <div class="w-full">
                                    <label for="content3" class="text-sm font-medium text-armadillo-900 block mb-3">Contenu 3</label>
                                    <textarea name="content3" id="content3" placeholder="Contenu 3" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">{{ isset($options[2]) ? $options[2]['content']  : '' }}</textarea>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-2/5">
                                    <label for="title4" class="text-sm font-medium text-armadillo-900 block mb-2">Titre 4</label>
                                    <input name="title4" id="title4" placeholder="Titre 4"
                                        class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5"
                                        value="{{ isset($options[3]) ? $options[3]['title'] : '' }}"
                                    >
                                </div>
                                <div class="w-full">
                                    <label for="content4" class="text-sm font-medium text-armadillo-900 block mb-2">Contenu 4</label>
                                    <textarea name="content4" id="content4" placeholder="Contenu 4" class="bg-gray-50 border border-gray-300 text-armadillo-900 sm:text-sm rounded-lg  block w-full outline-asparagus-600 p-2.5">{{ isset($options[3]) ? $options[3]['content'] : '' }}</textarea>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <div class="flex items-start">
                                    <button type="submit"
                                        data-id="{{ $service['id'] }}"
                                        class="admin_services_update_button w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Enregistrer</button>
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
            const submitButton = document.querySelector('#admin_services_create_button')

            submitButton.addEventListener('click', async (e) => {
                e.preventDefault()

                const formData = new FormData()

                formData.append('file', document.querySelector(
                    '#admin_services_create_form input[name="file"]').files[0])
                formData.append('data', JSON.stringify({
                    label: document.querySelector(
                        '#admin_services_create_form input[name="label"]').value,
                    content: document.querySelector(
                        '#admin_services_create_form textarea[name="content"]').value,
                    options: [
                        {
                            title: document.querySelector('#admin_services_create_form input[name="title1"]').value,
                            content: document.querySelector('#admin_services_create_form textarea[name="content1"]').value
                        },
                        {
                            title: document.querySelector('#admin_services_create_form input[name="title2"]').value,
                            content: document.querySelector('#admin_services_create_form textarea[name="content2"]').value
                        },
                        {
                            title: document.querySelector('#admin_services_create_form input[name="title3"]').value,
                            content: document.querySelector('#admin_services_create_form textarea[name="content3"]').value
                        },
                        {
                            title: document.querySelector('#admin_services_create_form input[name="title4"]').value,
                            content: document.querySelector('#admin_services_create_form textarea[name="content4"]').value
                        }
                    ]
                }))

                const rawResponse = await fetch('/services', {
                    method: 'POST',
                    headers: {
                        "X-CSRF-Token": document.querySelector(
                                '#admin_services_create_form input[name="_token"]')
                            .value
                    },
                    body: formData
                });

                await rawResponse.json();

                window.location.reload()
            })

            const deleteButtons = document.querySelectorAll('.admin_services_delete_button')

            for (let button of deleteButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const serviceId = button.getAttribute('data-id')

                    const rawResponse = await fetch(`/services/${serviceId}`, {
                        headers: {
                            "X-CSRF-Token": document.querySelector(
                                    `#csrf_row_${serviceId} input[name="_token"]`)
                                .value
                        },
                        method: 'DELETE',
                    });

                    await rawResponse.json();

                    window.location.reload()
                })
            }

            const updateButtons = document.querySelectorAll('.admin_services_update_button')

            for (let button of updateButtons) {
                button.addEventListener('click', async (e) => {
                    e.preventDefault()

                    const serviceId = button.getAttribute('data-id')

                    await fetch(`/services/${serviceId}`, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": document.querySelector(`#admin_services_update_form-${serviceId} input[name="_token"]`)?.value
                        },
                        method: 'PUT',
                        body: JSON.stringify({
                            label: document.querySelector(
                                `#admin_services_update_form-${serviceId} input[name="label"]`).value,
                            content: document.querySelector(
                                `#admin_services_update_form-${serviceId} textarea[name="content"]`).value,
                            options: [
                                {
                                    title: document.querySelector(`#admin_services_update_form-${serviceId} input[name="title1"]`).value,
                                    content: document.querySelector(`#admin_services_update_form-${serviceId} textarea[name="content1"]`).value,
                                },
                                {
                                    title: document.querySelector(`#admin_services_update_form-${serviceId} input[name="title2"]`).value,
                                    content: document.querySelector(`#admin_services_update_form-${serviceId} textarea[name="content2"]`).value,
                                },
                                {
                                    title: document.querySelector(`#admin_services_update_form-${serviceId} input[name="title3"]`).value,
                                    content: document.querySelector(`#admin_services_update_form-${serviceId} textarea[name="content3"]`).value,
                                },
                                {
                                    title: document.querySelector(`#admin_services_update_form-${serviceId} input[name="title4"]`).value,
                                    content: document.querySelector(`#admin_services_update_form-${serviceId} textarea[name="content4"]`).value,
                                }
                            ]
                        })
                    });

                    const file = document.querySelector(
                        `#admin_services_update_form-${serviceId} input[name="file"]`).files[0]

                        if (file) {
                            const formData = new FormData()
                            formData.append('file', file)

                            await fetch(`/services/${serviceId}/image`, {
                                method: 'POST',
                                headers: {
                                    "X-CSRF-Token": document.querySelector(`#admin_services_update_form-${serviceId} input[name="_token"]`)?.value
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
