@extends('layouts/admin')

@section('title', 'Arcadia - Admin Services')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Services
        </h1>
        @if (in_array(Auth::user()->role->id, [1]))
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
        @endif

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
                                <button type="submit"
                                    class="focus:outline-none text-white bg-orange-600 hover:bg-orange-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    data-modal-target="admin-services-update-modal-{{ $service['id'] }}"
                                    data-modal-toggle="admin-services-update-modal-{{ $service['id'] }}"
                                >
                                    Modifier
                                </button>
                                @if (in_array(Auth::user()->role->id, [1]))
                                    <form method="POST" action="{{ route('admin_services_delete', ['serviceId' => $service['id']]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="admin_services_delete_button focus:outline-none text-white bg-red-600 hover:bg-red-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Supprimer</button>
                                    </form>
                                @endif
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
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_services_create') }}" method="POST" enctype="multipart/form-data">
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
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'required' => true,
                            'rows' => 2,
                            'hasError' => !!$errors->first('content'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'label' => 'Image(s)',
                            'name' => 'file',
                            'type' => 'file',
                            'accept' => 'image/png,image/jpeg,image/jpg',
                            'hasError' => !!$errors->first('file'),
                        ])
                        <div class="flex gap-4">
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Titre',
                                'name' => 'options[][title]',
                            ])
                            @include('partials.form.textarea', [
                                'class' => 'w-full',
                                'label' => 'Contenu',
                                'name' => 'options[][content]',
                                'rows' => 2,
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            ])
                        </div>
                        <div class="flex gap-4">
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Titre',
                                'name' => 'options[][title]',
                            ])
                            @include('partials.form.textarea', [
                                'class' => 'w-full',
                                'label' => 'Contenu',
                                'name' => 'options[][content]',
                                'rows' => 2,
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            ])
                        </div>
                        <div class="flex gap-4">
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Titre',
                                'name' => 'options[][title]',
                            ])
                            @include('partials.form.textarea', [
                                'class' => 'w-full',
                                'label' => 'Contenu',
                                'name' => 'options[][content]',
                                'rows' => 2,
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            ])
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
                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_services_update', ['serviceId' => $service['id']]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'label' => 'Nom',
                                'name' => 'label',
                                'required' => true,
                                'value' => $service['label'],
                                'hasError' => !!$errors->first('label'),
                            ])
                            @include('partials.form.textarea', [
                                'class' => 'w-full',
                                'label' => 'Description',
                                'name' => 'content',
                                'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                'required' => true,
                                'value' => $service['content'],
                                'rows' => 2,
                                'hasError' => !!$errors->first('content'),
                            ])
                            @include('partials.form.input', [
                                'class' => 'w-full',
                                'label' => 'Image(s)',
                                'name' => 'file',
                                'type' => 'file',
                                'accept' => 'image/png,image/jpeg,image/jpg',
                                'hasError' => !!$errors->first('file'),
                            ])
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
                                @include('partials.form.input', [
                                    'class' => 'w-full',
                                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                    'label' => 'Titre',
                                    'value' => isset($options[0]['title']) ? $options[0]['title'] : '',
                                    'name' => 'options[0][title]',
                                ])
                                @include('partials.form.textarea', [
                                    'class' => 'w-full',
                                    'label' => 'Contenu',
                                    'name' => 'options[0][content]',
                                    'rows' => 2,
                                    'value' => isset($options[0]['content']) ? $options[0]['content'] : '',
                                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                ])
                            </div>
                            <div class="flex gap-4">
                                @include('partials.form.input', [
                                    'class' => 'w-full',
                                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                    'label' => 'Titre',
                                    'value' => isset($options[1]['title']) ? $options[1]['title'] : '',
                                    'name' => 'options[1][title]',
                                ])
                                @include('partials.form.textarea', [
                                    'class' => 'w-full',
                                    'label' => 'Contenu',
                                    'name' => 'options[1][content]',
                                    'rows' => 2,
                                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                    'value' => isset($options[1]['content']) ? $options[1]['content'] : '',
                                ])
                            </div>
                            <div class="flex gap-4">
                                @include('partials.form.input', [
                                    'class' => 'w-full',
                                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                    'label' => 'Titre',
                                    'name' => 'options[2][title]',
                                    'value' => isset($options[2]['title']) ? $options[2]['title'] : '',
                                ])
                                @include('partials.form.textarea', [
                                    'class' => 'w-full',
                                    'label' => 'Contenu',
                                    'name' => 'options[2][content]',
                                    'rows' => 2,
                                    'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                                    'value' => isset($options[2]['content']) ? $options[2]['content'] : '',
                                ])
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
@endsection
