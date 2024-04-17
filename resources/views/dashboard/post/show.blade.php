<x-app-layout>
    <section class="content">
        <div class="container-fluid">
            <img class="img-fluid" style="height:250px" src="{{ route('file', $post->media->hash ) }}" alt="">

            <h1>{{ $post->title }}</h1>

            <p>{{ $post->conte }}</p>

            <a href="{{ route('posts.index') }}" class="btn btn-dark">Home</a>
        </div>
    </section>
</x-app-layout>
