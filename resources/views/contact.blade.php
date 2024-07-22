@extends('layouts/default')

@section("title", "Arcadia - Contact")

@section("content")
    <main class="container mx-auto py-20 px-4">
        <div id="form_contact" class="sm:max-w-xl sm:mx-auto bg-armadillo-100 w-full flex flex-col gap-8 items-center pt-8 rounded-xl shadow-lg px-12">
            <div id="contact-success-message" class="bg-green-400 text-white p-4 rounded-xl w-full hidden">
                Avis enregistré avec succès
            </div>
            <div  id="contact-error-message" class="bg-red-400 text-white p-4 rounded-xl w-full hidden"></div>
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-center text-asparagus-500">Contactez nous</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-armadillo-300 sm:text-xl">
                Une question? Remplissez
                le formulaire ci-dessous, une réponse vous sera envoyée dans les meilleurs délais.
            </p>
            @csrf
            <div class="w-full flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Email <span class="text-red-500">*</span></label>
                <input type="text" name="email" class="p-4 rounded-xl resize-none outline-asparagus-600"
                    placeholder="Email"></input>
            </div>
            <div class="w-full flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Sujet <span class="text-red-500">*</span></label>
                <input type="text" name="subject" class="p-4 rounded-xl resize-none outline-asparagus-600"
                    placeholder="Sujet..."></input>
            </div>
            <div class="w-full flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Votre
                    message <span class="text-red-500">*</span></label>
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
        const emailEl = document.querySelector('#form_contact input[name="email"]')
        const subjectEl = document.querySelector('#form_contact input[name="subject"]')
        const contentEl = document.querySelector('#form_contact textarea[name="content"]')
        const successEl = document.querySelector('#contact-success-message')
        const errorEl = document.querySelector('#contact-error-message')

        submitButton.addEventListener('click', async (e) => {
            e.preventDefault()

           try {
                if (!emailEl.value || !subjectEl.value || !contentEl.value) {
                    if (!emailEl.value) {
                        emailEl.classList.add(...['border', 'border-red-500'])
                    }
                    if (!subjectEl.value) {
                        subjectEl.classList.add(...['border', 'border-red-500'])
                    }
                    if (!contentEl.value) {
                        contentEl.classList.add(...['border', 'border-red-500'])
                    }
                    throw new Error('Le formulaire est invalide')
                }

                const response = await fetch('/emails/send/2', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": document.querySelector(
                            '#form_contact input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        to: 'contact.arcadiazoo@gmail.com',
                        params: {
                            EMAIL: emailEl.value,
                            SUBJECT: subjectEl.value,
                            CONTENT: contentEl.value
                        }
                    })
                });

                if (!response.ok) {
                    throw new Error('Erreur lors de l\'envoi du message')
                }

                emailEl.value = ''
                subjectEl.value = ''
                contentEl.value = ''
                errorEl.classList.add('hidden')
                successEl.classList.remove('hidden')
           } catch (error) {
                errorEl.classList.remove('hidden')
                errorEl.textContent = error.message
           }
        })
    })
</script>
