<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-60 w-64 h-screen pt-20 transition-transform -translate-x-full bg-armadillo-100 border-r border-armadillo-200 sm:translate-x-0 d"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-armadillo-100 ">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin_' . strtolower(Auth::user()->role->label)) }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_' . strtolower(Auth::user()->role->label) ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_users') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_users' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_services') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200  hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_services' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Services</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_hours') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_hours' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Horaires</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin_homes') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200 hover:text-asparagus-500 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Habitats</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_animals') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200 hover:text-asparagus-500 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Animaux</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_feedbacks') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200 hover:text-asparagus-500 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Avis</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin_report_veterinary') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg  hover:bg-asparagus-200 hover:text-asparagus-500 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Rapports vétérinaires</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
