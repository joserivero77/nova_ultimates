@extends ('layouts.admin')
@section ('contenido')
<!DOCTYPE html>
<html>
<head>
    <title>Create Usuario</title>
</head>
<body>
    <h1>Create User</h1>

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="roles[]" id="roles" multiple="multiple">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="permissions">Permissions</label>
            <select name="permissions[]" id="permissions" multiple="multiple">
                @foreach($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>

@endsection
