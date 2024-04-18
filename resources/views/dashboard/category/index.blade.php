<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Categorias</h1>

                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
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
                                @foreach ($categorias as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este category?')) document.getElementById('form-delete-{{ $category->id }}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="post" id="form-delete-{{ $category->id }}">@csrf @method('DELETE')</form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-end">
                            {{ $categorias->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
