<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Post Detail</h1>

                    <a href="{{ route('posts.index') }}" class="btn btn-dark">Voltar</a>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <img class="img-fluid" style="height:250px" id="post-image" alt="Imagem">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>

            <div class="w-100 pb-3">
                <h4>Comentarios</h4>
                @include('dashboard.post.comment.create', ['postId' => $post->id])
                @foreach ($post->comments as $comment)
                    <div class="rounded mt-2" style="background: #ebeaea;padding:5px;">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="m-0"><strong>{{ $comment->user->name }}</strong></p>
                            <div class="d-flex gap-3">
                                <a href="#" class="btn btn-info edit-comment-btn"
                                    data-toggle="modal"
                                    data-target="#edit-comment-modal"
                                    data-comment-id="{{ $comment->id }}"
                                    style="
                                        padding-bottom: 3px;
                                        padding-left: 7px;
                                        padding-right: 3px;
                                        padding-top: 3px;
                                        margin: 3px;
                                    "><i class="fa fa-edit"></i>
                                </a>

                                @include('dashboard.post.comment.modal')

                                <a href="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}"
                                    onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este post?')) document.getElementById('post-delete-{{ $comment->id }}').submit();"
                                    class="btn btn-danger"
                                    style="
                                        padding-bottom: 3px;
                                        padding-left: 7px;
                                        padding-right: 5px;
                                        padding-top: 3px;
                                        margin: 3px;
                                    "><i class="fa fa-trash"></i>
                                </a>
                                <form
                                    action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}"
                                    method="POST" id="post-delete-{{ $comment->id }}">@csrf @method('DELETE')
                                </form>
                            </div>
                        </div>
                        <h5 class="m-0 rounded" style="background: #dcdcdc;padding:5px;">{{ $comment->message }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<script>

$(document).on('click', '.edit-comment-btn', function(e) {
        e.preventDefault();

        var commentId = $(this).data('comment-id');

        $.ajax({
            url: '{{ route('posts.comments.edit', ['post' => $post->id, 'comment' => $comment->id]) }}',
            method: 'GET',
            data: {
                comment: commentId
            },
            success: function(response) {
                $('#edit-comment-modal .modal-body').html(response);
                $('#edit-comment-modal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Erro ao carregar o formulário de edição do comentário:', error);
            }
        });
    });

    @if ($post->media)
        fetch('{{ route('file', $post->media->hash) }}').then(response => response.json())
            .then(data => {
                document.getElementById('post-image').src = data.url;
            })
            .catch(error => console.error('Erro ao carregar a imagem:', error));
    @else
        document.getElementById('post-image').src = '';
    @endif
</script>
