<form action="{{ route('posts.comments.store', $postId) }}" method="post" enctype="multipart/form-data" class="mb-4">
    @csrf
    <x-textarea label="Adicionar Comentário" name="message" id="message" cols="30" rows="5"></x-textarea>
    <button class="btn btn-primary">Enviar</button>
</form>
