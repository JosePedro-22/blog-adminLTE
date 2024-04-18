<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>User</h1>

                    <a href="{{ route('users.index') }}" class="btn btn-dark">
                        Home
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input type="text" :value="old('name',  $user->name)" label="Nome" name="name" id="name"></x-input>
                            <x-input type="text" :value="old('name',  $user->email)" label="Email" name="email" id="email"></x-input>
                            <x-input type="password" label="Senha" name="password" id="password"></x-input>
                            <x-input type="password" label="Confirmar Senha" name="password_confirmation" id="password_confirmation"></x-input>
                            <x-input.checkbox :checked="$user->active" label="Ativo" name="active" id="active"/>
                            <button class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('scripts')
        <script src="{{ asset('pulgins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
        <script src="{{ asset('js/demo.js') }}"></script>
    @endpush
</x-app-layout>
