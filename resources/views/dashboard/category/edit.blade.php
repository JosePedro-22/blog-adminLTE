<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Categoria</h1>

                    <a href="{{ route('categories.index') }}" class="btn btn-dark">
                        Voltar
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input type="text" label="Nome" :value="old('name', $category->name)"  name="name" id="name"></x-input>

                            <x-input.checkbox label="Ativo" name="active" id="active" :checked="old('active', $category->active) === true || old('active', $category->active)=== 'on' "/>
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
