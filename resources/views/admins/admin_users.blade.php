@extends('layouts/admin')

@section('title', 'Arcadia - Admin Utilisateurs')

@section('content')
    <main class="py-24 px-4 sm:pl-[255px]">
        <h1 class="text-4xl font-bold text-center font-title text-asparagus-500">
            Utilisateurs
        </h1>
        <div class="mt-10 flex justify-end">
            <button
                type="button"
                data-modal-target="admin-users-create-modal"
                data-modal-toggle="admin-users-create-modal"
                class="focus:outline-none text-white bg-asparagus-600 hover:bg-asparagus-800 font-medium rounded-lg text-sm px-5 py-2.5"
            >
                Créer un nouvel utilisateur
            </button>
        </div>
        <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg sm:ml-4">
            <table class="w-full text-sm text-left rtl:text-right text-armadillo-500 ">
                <thead class="text-xs text-asparagus-500 uppercase bg-armadillo-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Rôle
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prénom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-armadillo-50 border-b   hover:bg-armadillo-100 ">
                            <th scope="row" class="px-6 py-4 font-medium text-armadillo-800 whitespace-nowrap">
                                {{ $user['role']['label'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user['firstname'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user['lastname'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user['username'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="admin-users-create-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative">
                    <div class="flex justify-end p-2">
                        <button type="button"
                            class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-toggle="admin-users-create-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('admin_users_create') }}" method="post">
                        @csrf
                        @include('partials.form.select', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Rôle',
                            'name' => 'role_id',
                            'options' => $roles,
                            'required' => true, 
                            'hasError' => !!$errors->first('role_id'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Prénom',
                            'name' => 'firstname',
                            'required' => true, 
                            'hasError' => !!$errors->first('firstname'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Nom',
                            'name' => 'lastname',
                            'required' => true, 
                            'hasError' => !!$errors->first('lastname'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Email',
                            'name' => 'username',
                            'required' => true, 
                            'hasError' => !!$errors->first('username'),
                        ])
                        @include('partials.form.input', [
                            'class' => 'w-full',
                            'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                            'label' => 'Mot de passe',
                            'name' => 'password',
                            'required' => true, 
                            'hasError' => !!$errors->first('password'),
                        ])
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <button id="admin_users_button" type="submit"
                                    class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
