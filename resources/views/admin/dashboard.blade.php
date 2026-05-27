<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador (ABM) - Anderson Cutile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark shadow mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1 fw-bold">Panel de Administración (ABM)</span>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger fw-bold">Cerrar Sesión</button>
            </form>
        </nav>
    <main class="container">
        @if(session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif
        <div class="card p-4 mb-4 shadow-sm border-0">
            <h4 class="mb-3 text-secondary fw-bold">Registrar Nuevo Usuario</h4>
            <form action="{{ route('admin.users.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Nombre Completo</label>
                    <input type="text" name="name" class="form-control" placeholder="Ej: Omar" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Nombre de Usuario (Login)</label>
                    <input type="text" name="email" class="form-control" placeholder="Ej: omarqm" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Rol Asignado</label>
                    <select name="role" class="form-select">
                        <option value="user">Usuario Regular</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100 fw-bold">Crear</button>
                </div>
            </form>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover table-striped m-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nombre Completo</th>
                            <th>Nombre de Usuario</th>
                            <th>Rol</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td class="ps-3 fw-bold text-muted">{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td><code class="text-primary fw-semibold">{{ $u->email }}</code></td>
                            <td>
                                <span class="badge {{ $u->role == 'admin' ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ strtoupper($u->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-semibold" onclick="return confirm('¿Estás seguro de eliminar a este usuario?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
