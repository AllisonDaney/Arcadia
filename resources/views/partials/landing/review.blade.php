<section class="mb-36 ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-24 ">
            <span class="text-sm text-armadillo-900 font-medium text-center block mb-2"></span>
            <h2 class="text-3xl text-center font-semibold text-asparagus-500 font-title">Nos clients parlent pour vous</h2>
        </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper w-max">
                @foreach($feedbacks as $feedback)
                    <div class="swiper-slide !h-[303px]">
                        <div
                            class="group h-full flex flex-col bg-armadillo-200 border border-solid border-armadillo-200 rounded-xl p-6 transition-all duration-500  w-full mx-auto  hover:shadow-sm ">
                            <div class="h-full">
                                <div class="flex items-center mb-7 gap-2 text-amber-500 transition-all duration-500  ">
                                    @for($i = 0; $i < $feedback["rating"]; $i++)
                                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endfor
                                </div>
                                <p
                                    class="text-base text-armadillo-900 leading-6  transition-all duration-500 pb-8">
                                    {{ $feedback["content"] }}
                                </p>
                            </div>
                            <div class="flex items-center gap-5 border-t border-solid border-armadillo-600 pt-5">

                                <div class="block">
                                    <h5 class="text-armadillo-900 font-medium transition-all duration-500  mb-1">{{ $feedback["pseudo"] }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
