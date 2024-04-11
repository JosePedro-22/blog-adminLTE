<x-app-layout>
    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Sair</a>
    <form action="{{route('logout')}}" method="POST" id="form-logout">
        @csrf
    </form>
</x-app-layout>
