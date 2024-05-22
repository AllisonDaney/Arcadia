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
            @if (in_array(Auth::user()->role->id, [1]))
                <li>
                    <a href="{{ route('admin_users') }}"
                        class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_users' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                        <span class="flex-1 ms-3 whitespace-nowrap">Utilisateurs</span>
                    </a>
                </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1, 2]))
            <li>
                <a href="{{ route('admin_services') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200  hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_services' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Services</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1]))
            <li>
                <a href="{{ route('admin_hours') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_hours' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Horaires</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1]))
            <li>
                <a href="{{ route('admin_homes') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_homes' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Habitats</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1, 3]))
            <li>
                <a href="{{ route('admin_homes_comments') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_homes_comments' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Commentaires habitats</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1]))
            <li>
                <a href="{{ route('admin_animals') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_animals' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Animaux</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1]))
            <li>
                <a href="{{ route('admin_animals_reports') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_animals_reports' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Rapports animaux</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1, 2]))
            <li>
                <a href="{{ route('admin_feedbacks') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_feedbacks' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Avis</span>
                </a>
            </li>
            @endif
            @if (in_array(Auth::user()->role->id, [1, 3]))
            <li>
                <a href="{{ route('admin_veterinarians_reports') }}"
                    class="flex items-center p-2 text-armadillo-900 rounded-lg hover:bg-asparagus-200 hover:text-asparagus-500 group {{ Request::route()->getName() === 'admin_veterinarians_reports' ? 'bg-asparagus-200 text-asparagus-500' : '' }}">
                    <span class="flex-1 ms-3 whitespace-nowrap">Rapports vétérinaires</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
