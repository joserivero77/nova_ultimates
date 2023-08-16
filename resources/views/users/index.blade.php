@extends ('layouts.admin')
@section ('contenido')
<div>
<head>
    <title>Usuarios</title>
</head>

    <h1>Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Permisos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                    <span class="label label-info">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td>
                    @foreach($user->permissions as $permission)
                    <span class="label label-success">{{ $permission->name }}</span>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('users.create') }}">Crear nuevo Usuario</a>

</div>

@endsection
