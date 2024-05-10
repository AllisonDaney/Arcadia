<section class="mb-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-24">
            <h2 class="font-title text-3xl text-center font-semibold  text-asparagus-500">A la découverte d'Arcadia </h2>
        </div>
        <div class="grid grid-cols-1 min-[500px]:grid-cols-2 md:grid-cols-6 lg:grid-cols-3  max-w-xl mx-auto md:max-w-3xl lg:max-w-full gap-8 cursor-pointer">
            <a href="{{ route('home') }}" class="block group md:col-span-2 lg:col-span-1 ">
                <div class="relative mb-6">
                    <img src="{{ asset('img/savane.jpeg') }}" alt="habitat savane"
                        class="w-40 h-40 rounded-full mx-auto transition-all duration-500 object-cover border border-solid border-transparent " />
                </div>
                <h4
                    class="text-xl text-asparagus-500 mb-2 capitalize text-center transition-all duration-500 ">
                    Nos habitats
                    </h4>
                <span
                    class="text-armadillo-900 text-m text-center block transition-all duration-500 ">Partez à la découverte de nos animaux répartis en différents habitats.</span>
            </a>
            <a href="{{ route('animals') }}"class="block group md:col-span-2 lg:col-span-1 ">
                <div class="relative mb-6">
                    <img src="{{ asset('img/zebre.jpeg') }}" alt="zebre"
                        class="w-40 h-40 rounded-full mx-auto transition-all duration-500 object-cover border border-solid border-transparent " />
                </div>
                <h4
                    class="text-xl  text-asparagus-500 mb-2 capitalize text-center transition-all duration-500 ">
                    Nos animaux
                </h4>
                <span
                    class="text-armadillo-900 text-m text-center block transition-all duration-500 ">Une aventure extraordinaire vous attend à la rencontre de nos animaux</span>
            </class=>
        </a>
        <a href="{{ route('services') }}"class="block group md:col-span-2 lg:col-span-1 ">
                <div class="relative mb-6">
                    <img src="{{ asset('img/petit_train.jpeg') }}" alt="petit train zoo"
                        class="w-40 h-40 rounded-full mx-auto transition-all duration-500 object-cover border border-solid border-transparent " />
                </div>
                <h4
                    class="text-xl  text-asparagus-500 mb-2 capitalize text-center transition-all duration-500 ">
                    Nos services
                </h4>
                <span
                    class="text-armadillo-900 text-m text-center block transition-all duration-500 ">Tout au long de votre parcours vous aurez accès à nos différents services. </span>
                </a>
            </div>
        </div>
    </div>
</section>
