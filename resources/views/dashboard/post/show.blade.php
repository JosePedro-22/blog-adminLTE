<x-app-layout>
    <div class="content-wrapper">
        <div class="container-fluid">
            <img class="img-fluid" style="height:250px" id="post-image" alt="Imagem">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-dark">Home</a>
        </div>
    </div>
</x-app-layout>

<script>
    fetch('{{ route('file', $post->media->hash) }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('post-image').src = data.url;
        })
        .catch(error => console.error('Erro ao carregar a imagem:', error));
</script>
