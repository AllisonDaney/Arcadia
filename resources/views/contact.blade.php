@extends('layouts/default')

@section("title", "Arcadia - Contact")

@section("content")
    <main class="container mx-auto py-20 px-4">
        <div id="form_contact" class="sm:max-w-xl sm:mx-auto bg-armadillo-100 w-full flex flex-col gap-8 items-center pt-8 rounded-xl shadow-lg px-12">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-center text-asparagus-500">Contactez nous</h2>
            <p class="mb-8 lg:mb-12 font-light text-center text-armadillo-300 sm:text-xl">
                Une question? Remplissez
                le formulaire ci-dessous, une réponse vous sera envoyée dans les meilleurs délais.
            </p>
            <form action="{{ route('contacts_create') }}" method="post" class="w-full flex flex-col gap-8 items-center">
                @csrf
                @include('partials.form.input', [
                    'class' => 'w-full',
                    'label' => 'Email',
                    'name' => 'email',
                    'required' => true, 
                    'hasError' => !!$errors->first('email'),
                ])
                @include('partials.form.input', [
                    'class' => 'w-full',
                    'label' => 'Sujet',
                    'name' => 'subject',
                    'required' => true, 
                    'hpasError' => !!$errors->first('subject'),
                ])
                @include('partials.form.textarea', [
                    'class' => 'w-full',
                    'label' => 'Votre message',
                    'name' => 'content',
                    'required' => true,
                    'hasError' => !!$errors->first('content'),
                ])
                <button class="w-3/4 py-3 my-8 text-lg bg-gradient-to-r from-asparagus-400 to-asparagus-600 rounded-xl text-asparagus-50">Envoyer</button>
            </form>
        </div>
    </main>
@endsection
