<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Posts</h1>

                    <a href="{{ route('posts.index') }}" class="btn btn-dark">
                        Voltar
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="custom-file">
                                    <label for="thumbnail">Capa</label>
                                    <input type="file" name="thumbnail" id="thumbnail" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('name')
                                    ]) accept="image/*">

                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <x-input type="text" label="Título" name="title" id="title"></x-input>
                            <x-select label="Categoria" id="category_id" name="category_id">
                                <option value="" disabled selected>Selecione</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </x-select>
                            <x-textarea label="Conteúdo" name="content" id="content" cols="30" rows="10"></x-textarea>
                            <x-select label="Status" name="status" id="status1">
                                <option value="" disabled selected>Selecione</option>
                                <option>Rascunho</option>
                                <option>Publicado</option>
                            </x-select>

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
