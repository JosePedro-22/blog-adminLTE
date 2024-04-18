<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Posts</h1>

                    <a href="{{ route('users.index') }}" class="btn btn-dark">
                        Voltar
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-input type="text" label="Nome" :value="old('name')" name="name" id="name"></x-input>
                            <x-input type="text" label="Email" name="email" id="email" :value="old('email')"></x-input>
                            <x-input type="password" label="Senha" name="password" id="password"></x-input>
                            <x-input type="password" label="Confirmar Senha" name="password_confirmation" id="password_confirmation"></x-input>
                            <x-input.checkbox label="Ativo" name="active" id="active" :checked="old('active') == true || old('active') == 'on'">
                            <button class="btn btn-primary">Salvar</button>
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
