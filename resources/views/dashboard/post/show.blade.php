<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Post Detail</h1>

                    <a href="{{ route('posts.index') }}" class="btn btn-dark">Home</a>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <img class="img-fluid" style="height:250px" id="post-image" alt="Imagem">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
        </div>
    </div>
</x-app-layout>

<script>
    @if ($post->media)
        fetch('{{ route('file', $post->media->hash) }}')  .then(response => response.json())
            .then(data => {
                document.getElementById('post-image').src = data.url;
            })
            .catch(error => console.error('Erro ao carregar a imagem:', error));
    @else
        document.getElementById('post-image').src = '';
    @endif
</script>
