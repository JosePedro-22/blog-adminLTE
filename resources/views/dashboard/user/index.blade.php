<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2">
                    <h1>Usuarios</h1>

                    <a href="{{ route('users.create') }}" class="btn btn-primary">
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
                                    <th>Autor</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($usuarios as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este user?')) document.getElementById('form-delete-{{ $user->id }}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post" id="form-delete-{{ $user->id }}">@csrf @method('DELETE')</form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-end">
                            {{ $usuarios->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
