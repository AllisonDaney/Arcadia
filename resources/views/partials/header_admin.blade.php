<nav class="fixed top-0 z-10 w-full bg-armadillo-100 border-b border-armadillo-200 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <img src="{{ asset('img/logo.png') }}" class="h-8 me-3" alt="Logo Arcadia" />
            </div>
            <div class="flex items-center">
                <div class="flex items-center">
                    <div data-dropdown-toggle="dropdown-user"
                        class="flex items-center gap-4 cursor-pointer select-none text-asparagus-500">
                        <p>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </div>
                </div>

                <div class="z-50 hidden my-4 text-base list-none bg-armadillo-100 divide-y divide-armadillo-200 rounded shadow"
                    id="dropdown-user">
                    <div class="px-4 py-3" role="none">
                        <p class="text-sm text-armadillo-900 " role="none">
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </p>
                        <p class="text-sm font-medium text-armadillo-900 truncate " role="none">
                            {{ Auth::user()->username }}
                        </p>
                    </div>
                    <ul class="py-1" role="none">
                        <li id="logout_button" class="cursor-pointer">
                            @csrf
                            <div class="block px-4 py-2 text-sm text-armadillo-900 hover:bg-armadillo-50">
                                Deconnexion
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>


<script>
    window.addEventListener('load', function() {
        const logoutButton = document.querySelector('#logout_button')

        logoutButton?.addEventListener('click', async (e) => {
            e.preventDefault()

            await fetch('/auth/logout', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": document.querySelector(
                        '#logout_button input[name="_token"]').value
                },
                body: JSON.stringify({})
            });

            window.location.href = '/'
        })
    })
</script>
