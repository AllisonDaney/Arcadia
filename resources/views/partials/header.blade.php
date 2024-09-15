<nav class="lg:fixed w-full bg-armadillo-100 transition-all duration-500 z-10 shadow-xl">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="w-full flex flex-col lg:flex-row">
            <div class="flex justify-between  lg:flex-row py-3">
                <a href="{{ route('landing') }}" class="flex items-center">
                    <img class="h-16" src="{{ asset('img/logo.png') }}" alt="Image du logo Arcadia">
                </a>
                <!--menu burger-->
                <button data-collapse-toggle="navbar" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                    aria-controls="navbar-authentication" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d=" M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3
                                15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden w-full lg:flex lg:pl-24 max-lg:py-4 lg:justify-between" id="navbar">
                <ul class="flex gap-10 lg:items-center flex-col max-lg:gap-4 mt-4 lg:mt-0 lg:flex-row max-lg:mb-4">
                    <li
                        class=" flex flex-row items-center relative h-full cursor-pointer text-base text-center lg:text-base font-medium hover:text-asparagus-600 transition-all duration-500 mb-2 md:mb-0 {{ Request::route()->getName() === 'landing' ? 'text-asparagus-500' : ''}}">
                        <a href="{{ route('landing') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </a>
                        <div class="h-1 duration-200 transition-all bg-asparagus-500 absolute bottom-0 {{ in_array(Request::route()->getName(), ['landing']) ? 'w-full' : '' }}" />
                    </li>
                    <li class="flex flex-row items-center relative h-full">
                        <a href="{{ route('home') }}"
                            class="text-armadillo-900 text-center text-lg font-medium hover:text-asparagus-600 transition-all duration-500 mb-2 block md:mb-0 {{ Request::route()->getName() === 'home' ? 'text-asparagus-500' : ''}}">Habitats</a>
                        <div class="h-1 duration-200 transition-all bg-asparagus-500 absolute bottom-0 {{ in_array(Request::route()->getName(), ['home', 'home_show']) ? 'w-full' : '' }}" />
                    </li>
                    <li class="flex flex-row items-center relative h-full">
                        <a href="{{ route('animals') }}"
                            class="text-armadillo-900 text-center text-lg font-medium hover:text-asparagus-600 transition-all duration-500 mb-2 block md:mb-0 {{ Request::route()->getName() === 'animals' ? 'text-asparagus-500' : ''}}">Animaux</a>
                        <div class="h-1 duration-200 transition-all bg-asparagus-500 absolute bottom-0 {{ in_array(Request::route()->getName(), ['animals']) ? 'w-full' : '' }}" />
                    </li>
                    <li class="flex flex-row items-center relative h-full">
                        <a href="{{ route('services') }}"
                            class="text-armadillo-900 text-center text-lg font-medium hover:text-asparagus-600 transition-all duration-500 mb-2 block md:mb-0 {{ Request::route()->getName() === 'services' ? 'text-asparagus-500' : ''}}">Services</a>
                        <div class="h-1 duration-200 transition-all bg-asparagus-500 absolute bottom-0 {{ in_array(Request::route()->getName(), ['services']) ? 'w-full' : '' }}" />
                    </li>
                    <li class="flex flex-row items-center relative h-full">
                        <a href="{{ route('contacts') }}"
                            class="text-armadillo-900 text-center text-lg font-medium hover:text-asparagus-600 transition-all duration-500 mb-2 block md:mb-0 {{ Request::route()->getName() === 'contacts' ? 'text-asparagus-500' : ''}}">Contact</a>
                        <div class="h-1 duration-200 transition-all bg-asparagus-500 absolute bottom-0 {{ in_array(Request::route()->getName(), ['contacts']) ? 'w-full' : '' }}" />
                    </li>
                    <li class="flex flex-row items-center relative h-full">
                        <a href="{{ route('infos') }}"
                            class="text-armadillo-900 text-center text-lg font-medium hover:text-asparagus-600 transition-all duration-500 mb-2 block md:mb-0 {{ Request::route()->getName() === 'infos' ? 'text-asparagus-500' : ''}}">Infos Utiles</a>
                            <div class="h-1 duration-200 transition-all bg-asparagus-500 absolute bottom-0 {{ in_array(Request::route()->getName(), ['infos']) ? 'w-full' : '' }}" />
                    </li>
                    <!-- Dropdown menu -->
                    <div id="megamenu" aria-labelledby="megamenu"
                        class="animate-fade z-10 relative lg:absolute top-2 lg:top-14  lg:-left-20 bg-white rounded-lg shadow-[0px_15px_30px_0px_rgba(16,24,40,0.1)] xl:p-8 lg:p-4 p-2 lg:min-w-[800px] md:min-w-[500px] min-w-full open hidden">
                        <div class="flex flex-col sm:flex-row lg:justify-between">
                        </div>
                    </div>
                    </li>
                </ul>
                @if (Auth::user())
                    <p id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex items-center">
                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </p>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('admin_' . strtolower(Auth::user()->role->label)) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Administration</a>
                            </li>
                            <li id="logout_button">
                                <form action="{{ route('auth_logout') }}" method="post">
                                    @csrf
                                    <button
                                        class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div id="login_button" class="flex flex-col items-center justify-center  text-armadillo-900 hover:text-asparagus-600 cursor-pointer" data-modal-target="authentication-modal"
                        data-modal-toggle="authentication-modal">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div class="text-l">
                            Connexion
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>


@if (!Auth::user())
    <div id="authentication-modal" aria-hidden="true"
        class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative">
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-armadillo-900 bg-transparent hover:bg-gray-200  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                        data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('auth_login') }}" method="post" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8">
                    <div id="login-error-message" class="bg-red-400 text-white p-4 rounded-xl mb-6 hidden"></div>  
                    @csrf
                    <h3 class="text-xl font-medium text-asparagus-500">Connectez-vous</h3>
                    @include('partials.form.input', [
                        'class' => 'w-full',
                        'label' => "Nom d'utilisateur",
                        'name' => 'username',
                        'required' => true,
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'hasError' => !!$errors->first('username'),
                    ])
                    @include('partials.form.input', [
                        'class' => 'w-full',
                        'label' => "Mot de passe",
                        'name' => 'password',
                        'required' => true, 
                        'type' => 'password',
                        'inputClass' => 'border border-gray-300 outline-asparagus-600 !p-3',
                        'hasError' => !!$errors->first('password'),
                    ])
                    <div class="flex justify-between">
                        <div class="flex items-start">

                        </div>
                        <a href="{{ route('reset_password') }}" class="text-sm text-asparagus-500 hover:underline">Mot de passe oublié?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-asparagus-50 bg-gradient-to-r from-asparagus-400 to-asparagus-600  font-medium rounded-xl text-m px-5 py-2.5 text-center ">Connexion</button> 
                </form>
            </div>
        </div>
    </div>
@endif
