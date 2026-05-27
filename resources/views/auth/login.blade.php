<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rodrigo Edson Cores Torrez</title> 
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background: radial-gradient(circle at top right, #1e2640, #0f111a);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.45);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1.25rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }
        .form-control {
            background-color: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f8fafc;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border-radius: 0.75rem;
        }
        .form-control:focus {
            background-color: rgba(15, 23, 42, 0.8);
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
            color: #fff;
        }
        .input-group-text-custom {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            color: #94a3b8;
            pointer-events: none;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border: none;
            padding: 0.75rem;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .brand-title {
            letter-spacing: 1.5px;
            background: linear-gradient(to right, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .student-badge {
            background-color: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            display: inline-block;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">

    <div class="card glass-card p-4 p-sm-5 shadow-2xl text-white" style="width: 100%; max-width: 440px;">
        
        <!-- Header -->
        <div class="text-center mb-4">
            <div class="mb-3 d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle" style="width: 60px; height: 60px;">
                <i class="bi bi-shield-lock-fill fs-2"></i>
            </div>
            <h3 class="fw-bold brand-title mb-2">INICIO DE SESIÓN</h3>
            <span class="student-badge">
                <i class="bi bi-person-badge me-1"></i> Estudiante: Rodrigo Edson Cores Torrez
            </span>
        </div>

        <!-- Alertas de Error de Laravel -->
        @if($errors->any())
            <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-3 py-2 px-3 small d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            
            <!-- Campo Usuario -->
            <div class="mb-3">
                <label class="form-label text-secondary small fw-semibold text-uppercase tracking-wider mb-2">Nombre de Usuario</label>
                <div class="position-relative">
                    <span class="input-group-text-custom"><i class="bi bi-person"></i></span>
                    <input type="text" name="email" class="form-control" required placeholder="username" autocomplete="off" value="{{ old('email') }}">
                </div>
            </div>
            <!-- Campo Contraseña -->
            <div class="mb-4">
                <label class="form-label text-secondary small fw-semibold text-uppercase tracking-wider mb-2">Contraseña</label>
                <div class="position-relative">
                    <span class="input-group-text-custom"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" required placeholder="••••••••">
                </div>
            </div>
            <!-- Opciones extra (Recuérdame) -->
            <div class="d-flex justify-content-between align-items-center mb-4 small">
                <div class="form-check">
                    <input class="form-check-input bg-transparent border-secondary" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-secondary" for="remember">
                        Recordarme
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-gradient btn-primary w-100 fw-bold text-uppercase tracking-wide">
                Ingresar <i class="bi bi-arrow-right-short ms-1 fs-5 align-middle"></i>
            </button>
        </form>
    </div>
</body>
</html>
