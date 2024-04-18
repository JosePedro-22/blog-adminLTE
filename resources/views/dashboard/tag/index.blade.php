<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Tags</h1>

                    <a href="{{ route('tags.create') }}" class="btn btn-primary">
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
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="#"
                                                    onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este category?')) document.getElementById('form-delete-{{ $tag->id }}').submit();"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                <form action="{{ route('tags.destroy', $tag->id) }}" method="post"
                                                    id="form-delete-{{ $tag->id }}">@csrf @method('DELETE')</form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-end">
                            {{ $tags->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
