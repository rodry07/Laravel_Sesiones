<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Panel de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card p-4 shadow border-0 text-center" style="width: 450px;">
        <div class="mb-3">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow" style="width: 70px; height: 70px; font-size: 30px; font-weight: bold;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
        </div>
        <h3 class="mb-1 fw-bold text-dark">Perfil de Usuario</h3>
        <p class="text-muted small mb-4">Datos del usuario logueado en la sesión</p>
        <div class="text-start mb-4">
            <div class="mb-2">
                <span class="text-muted small d-block fw-semibold">Nombre Completo:</span>
                <span class="fs-5 fw-bold text-secondary">{{ $user->name }}</span>
            </div>
            <div class="mb-2">
                <span class="text-muted small d-block fw-semibold">Nombre de Usuario:</span>
                <code class="fs-5 text-primary fw-semibold">{{ $user->email }}</code>
            </div>
            <div>
                <span class="text-muted small d-block fw-semibold">Rol Asignado:</span>
                <span class="badge bg-secondary px-3 py-2 mt-1">{{ strtoupper($user->role) }}</span>
            </div>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-danger w-100 fw-bold shadow-sm">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>
