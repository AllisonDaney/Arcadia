
@php  
    $name ??= '';
@endphp

<div class="flex justify-center items-center gap-3">
    <input type="hidden" name="{{ $name }}" value="3">
    @for($i = 0; $i < 5; $i++)
        <div id="review_stars-{{ $i }}" class="review_stars text-gray-500 transition-colors duration-200 cursor-pointer">
            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        </div>
    @endfor
</div>

<script>
    const stars = document.querySelectorAll('.review_stars')

        for(let i of stars.keys()) {
            stars[i].addEventListener('click', () => handleClickStar(i))
        }

        const handleClickStar = (starIndex) => {
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