<form action="{{ route('posts.comments.update',['post' => $post, 'comment' => $comment]) }}" method="post" enctype="multipart/form-data" class="mb-4">
    @csrf
    @method('PUT')
    {{-- <x-textarea label="Comentário" name="message" id="message" cols="30" rows="5">{{ $comment->message }}</x-textarea> --}}

    <div class="form-group">
        <label for="message">Comentário</label>

        <textarea id="message" cols="30" rows="5" class='form-control' name="message">{{ $comment->message }}
        </textarea>
    </div>

    <button class="btn btn-primary">Salvar</button>
</form>
