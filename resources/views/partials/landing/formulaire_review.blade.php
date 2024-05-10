@section("js-1")
    <script>
       const stars = document.querySelectorAll('.review_stars')

        for(let i of stars.keys()) {
            stars[i].addEventListener('click', (e) => handleClickStar(e, i))
        }

        const handleClickStar = (e, starIndex) => {
            for(let i of stars.keys()) {
                if (i <= starIndex) {
                    stars[i].classList.add("text-yellow-500")
                } else {
                    stars[i].classList.remove("text-yellow-500")
                }
            }

            document.querySelector('[name="rating"]').setAttribute("value", starIndex + 1)
        }

        document.querySelector('#review_stars-2').click()
    </script>
@endsection



<section class="mb-20">
<div class=" sm:max-w-xl sm:mx-auto">
    <h2 class="text-3xl text-center font-semibold text-asparagus-500 font-title">Votre avis nous interesse</h2>
    <div class="px-12 py-5">
    </div>
    <div class="bg-armadillo-100 w-full flex flex-col gap-8 items-center pt-8 rounded-xl shadow-lg">
        <div class="flex space-x-3">
            @csrf
            <input type="hidden" name="rating" value="3">
            @for($i = 0; $i < 5; $i++)
                <div id="review_stars-{{ $i }}" class="review_stars text-gray-500 transition-colors duration-200 cursor-pointer">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
             @endfor
        </div>

        <div class="w-3/4 flex flex-col">
                <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Pseudo</label>
                <input type="text" name="pseudo" class="p-4 rounded-xl resize-none outline-asparagus-600" placeholder="Pseudo"></input>
        </div>
        <div class="w-3/4 flex flex-col">
            <label for="email" class="text-sm font-medium text-armadillo-900 block mb-2 ">Votre message</label>
                <textarea name="content" rows="4" class="p-4 rounded-xl resize-none outline-asparagus-600" placeholder="Votre message" maxlength="160"></textarea>
                <button id="create_review" type="submit" value="envoyer" class="py-3 my-8 text-lg bg-gradient-to-r from-asparagus-400 to-asparagus-600 rounded-xl text-asparagus-50">Envoyer</button>
        </div>
    </div>
    </div>
</div>
</section>

<script>
    const submitButton = document.querySelector('#create_review')

    submitButton.addEventListener('click', async (e) => {
        e.preventDefault()

        const rawResponse =  await fetch('/feedbacks', {
            method: 'POST',
            headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            "X-CSRF-Token": document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                rating: document.querySelector('input[name="rating"]').value,
                pseudo: document.querySelector('input[name="pseudo"]').value,
                content: document.querySelector('textarea[name="content"]').value
            })
        });

        await rawResponse.json();

        window.location.reload()
    })
</script>
