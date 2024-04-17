<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Posts</h1>

                    <a href="{{ route('posts.index') }}" class="btn btn-dark">
                        Home
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="custom-file">
                                    <label for="thumbnail">Capa</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">

                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <x-input type="text" value="{{ $post->title }}" label="Título" name="title" id="title"></x-input>
                            <x-select label="Categoria" id="category_id" name="category_id">
                                <option value="" disabled selected>Selecione</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </x-select>

                            <x-textarea label="Conteúdo" :value="$post->content" name="content" id="content" cols="30" rows="10">
                            </x-textarea>

                            <x-select label="Status" name="status" id="status1">
                                <option value="" disabled selected>Selecione</option>
                                <option {{ $post->status == 'Rascunho' ? 'selected' : '' }}>Rascunho</option>
                                <option {{ $post->status == 'Publicado' ? 'selected' : '' }}>Publicado</option>
                            </x-select>

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