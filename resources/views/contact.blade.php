@extends('layouts/default')

@section("title", "Arcadia - Contact")

@section("content")
    <main class="container mx-auto py-20 px-4">
        <div id="form_contact" class="sm:max-w-xl sm:mx-auto bg-armadillo-100 w-full flex flex-col gap-8 items-center pt-8 rounded-xl shadow-lg">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-center text-asparagus-500">Contactez nous</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-armadillo-300  sm:text-xl">
                Une question? Remplissez
                le formulaire ci-dessous, une réponse vous sera envoyée dans les meilleurs délais.
            </p>
            @csrf
            <div class="w-3/4 flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Email</label>
                <input type="text" name="email" class="p-4 rounded-xl resize-none outline-asparagus-600"
                    placeholder="Email"></input>
            </div>
            <div class="w-3/4 flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Sujet</label>
                <input type="text" name="subject" class="p-4 rounded-xl resize-none outline-asparagus-600"
                    placeholder="Sujet..."></input>
            </div>
            <div class="w-3/4 flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Votre
                    message</label>
                <textarea name="content" rows="4" class="p-4 rounded-xl resize-none outline-asparagus-600"
                    placeholder="Votre message..." maxlength="160"></textarea>
                <button id="send_email" type="submit" value="envoyer"
                    class="py-3 my-8 text-lg bg-gradient-to-r from-asparagus-400 to-asparagus-600 rounded-xl text-asparagus-50">Envoyer</button>
            </div>
        </div>
    </main>
@endsection

<script>
    window.addEventListener('load', function() {
        const submitButton = document.querySelector('#send_email')

        submitButton.addEventListener('click', async (e) => {
            e.preventDefault()

            await fetch('/emails/send_contact', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": document.querySelector(
                        '#form_contact input[name="_token"]').value
                },
                body: JSON.stringify({
                    email: document.querySelector(
                        '#form_contact input[name="email"]').value,
                    subject: document.querySelector(
                        '#form_contact input[name="subject"]').value,
                    content: document.querySelector(
                            '#form_contact textarea[name="content"]')
                        .value
                })
            });

            document.querySelector('#form_contact input[name="email"]').value = ''
            document.querySelector('#form_contact input[name="subject"]').value = ''
            document.querySelector('#form_contact textarea[name="content"]').value = ''
        })
    })
</script>
