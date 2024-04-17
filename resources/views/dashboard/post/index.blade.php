<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Posts</h1>

                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        Cadastrar
                    </a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este post?')) document.getElementById('form-delete-{{ $post->id }}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" id="form-delete-{{ $post->id }}">@csrf @method('DELETE')</form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-end">
                            {{ $posts->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
