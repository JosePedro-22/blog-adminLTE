<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ auth()->user()->name }}
                </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                    class="d-block text-danger">Sair</a>
                <form action="{{ route('logout') }}" method="POST" id="form-logout">
                    @csrf
                </form>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <x-sidebar.link icon="nav-icon fas fa-solid fa-desktop" :href="route('dashboard')" :is-active="request()->is('dashboard')" style="cursor:pointer">
                    Home
                </x-sidebar.link>

                <x-sidebar.link icon="nav-icon fa-solid fa fa-users" :href="route('users.index')" :is-active="request()->is('user*')" style="cursor:pointer">
                    Usuarios
                </x-sidebar.link>

                <x-sidebar.link icon="nav-icon fa-solid fa fa-plus-square" :href="route('categories.index')" :is-active="request()->is('categories*')" style="cursor:pointer">
                    Categorias
                </x-sidebar.link>

                <x-sidebar.link icon="nav-icon fa-solid fa fa-tags" :href="route('tags.index')" :is-active="request()->is('tags*')" style="cursor:pointer">
                    Tags
                </x-sidebar.link>

                <x-sidebar.link icon="nav-icon fas fa-solid fa-newspaper" :href="route('posts.index')" :is-active="request()->is('posts*')" style="cursor:pointer">
                    Posts
                </x-sidebar.link>
            </ul>
        </nav>

    </div>
</aside>
