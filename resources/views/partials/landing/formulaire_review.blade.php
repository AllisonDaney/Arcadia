<section class="mb-20">
    <div class=" sm:max-w-xl sm:mx-auto">
        <h2 class="text-3xl text-center font-semibold text-asparagus-500 font-title mb-10">Votre avis nous interesse</h2>
        <form action="{{ route('feedbacks_create') }}" method="post" class="bg-armadillo-100 w-full flex flex-col gap-8 items-center pt-8 rounded-xl shadow-lg">
            @csrf
            @include('partials.form.star_review', [
                'name' => 'rating',
            ])
            @include('partials.form.input', [
                'class' => 'w-3/4',
                'label' => 'Pseudo',
                'name' => 'pseudo',
                'required' => true, 
                'hasError' => !!$errors->first('pseudo'),
            ])
            @include('partials.form.textarea', [
                'class' => 'w-3/4',
                'label' => 'Votre message',
                'name' => 'content',
                'required' => true,
                'hasError' => !!$errors->first('content'),
            ])
            <button id="create_review" type="submit" value="envoyer" class="w-3/4 py-3 my-8 text-lg bg-gradient-to-r from-asparagus-400 to-asparagus-600 rounded-xl text-asparagus-50">Envoyer</button>
        </form>
    </div>
</section>

<!-- <script>
    const submitButton = document.querySelector('#create_review')
    const pseudoEl = document.querySelector('input[name="pseudo"]')
    const contentEl = document.querySelector('textarea[name="content"]')
    const ratingEl = document.querySelector('input[name="rating"]')
    const errorEl = document.querySelector('#review-error-message')
    const successEl = document.querySelector('#review-success-message')

    submitButton.addEventListener('click', async (e) => {
        e.preventDefault()

        try {
            if (!pseudoEl.value || !contentEl.value) {
                if (!pseudoEl.value) {
                    pseudoEl.classList.add(...['border', 'border-red-500'])
                }
                if (!contentEl.value) {
                    contentEl.classList.add(...['border', 'border-red-500'])
                }
                throw new Error('Le formulaire est invalide')
            }

            await fetch('/feedbacks', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({
                    rating: ratingEl.value,
                    pseudo: pseudoEl.value,
                    content: contentEl.value
                })
            });

            errorEl.classList.add('hidden')
            successEl.classList.remove('hidden')
            pseudoEl.value = ''
            contentEl.value = ''
            handleClickStar(2)
        } catch (error) {
            errorEl.classList.remove('hidden')
            errorEl.textContent = error.message
        }
    })
</script> -->
