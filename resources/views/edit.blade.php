<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    
    <link rel="stylesheet" href="{{ asset('storage/css/styles.css') }}">
    
</head>
<body>

<!-- Encabezado con título, logo y barra de búsqueda -->
<div class="container text-center bg-encabezado mt-2 py-4">
    <div class="row align-items-center">
        <div class="col-md-1 text-start">
            <img src="{{ asset('storage/img/logoB.png') }}" alt="Logo" width="100">
        </div>
        <div class="col-md-7 text-md-start mt-2 mt-md-0">
            <h1 class="text-white">Administrador de Libros</h1>
        </div>
        <div class="col-md-4">
            <form action="{{ route('buscar') }}" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar libros" name="query" aria-label="Buscar">
                <button class="btn btn-outline-light btn-buscar" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</div>
<!-- Fin del encabezado -->

<!-- Contenedor principal -->
<div class="container mt-4" >
    <div class="row">
        <!-- Barra lateral derecha -->
        <div class="col-md-3" >
            <div class=" p-3 position-fixed bg-encabezado" style="height: 525px; width: 300px;" >
                <!-- Contenido de la barra lateral -->
                <a href="{{ route('listado.index') }}" class="btn btn-warning btn-lg" style="background-color: #F26A1B;">Listar Libros</a>
                <br><br><br>
                <a href="{{ route('administrar') }}" class="btn btn-warning btn-lg" style="background-color: #F26A1B;">Administrar Libro</a>
                <br><br><br>
                <!-- Botón "Nuevo" -->
                <a href="{{ route('libros.create') }}" class="btn btn-success btn-lg">Nuevo</a>
            </div>
        </div>
        <!-- Contenedor de la lista de libros -->
        <div class="col-md-9 offset-md-3 bg-encabezado" >
            <h3 class="text-center">Editor de libro</h3>
            <div class="p-3 bg-encabezado" style="max-height: 720px; overflow-y: auto;">
                <!-- Formulario de edición -->
                <form action="{{ route('libros.update', ['libro' => $libro->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $libro->nombre }}">
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{ $libro->autor }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                        <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="{{ $libro->fecha_publicacion }}">
                    </div>
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" class="form-control" id="editorial" name="editorial" value="{{ $libro->editorial }}">
                    </div>
                    <div class="mb-3">
                        <label for="portada" class="form-label">URL de Portada</label>
                        <input type="text" class="form-control" id="portada" name="portada" value="{{ $libro->portada }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container text-center bg-encabezado mt-2 py-4">
    <div class="row align-items-center">
        <div class="col-md-12 text-center">
            <footer class="footer mt-auto py-3  text-white text-center">
                <span class="text-muted">UBP | IS | Prog. Cliente-Serv | Jezer Samuel Chimal Ruiz | {{ date('Y-m-d') }}</span>
            </footer>
        </div>
    </div>
</div>

<!-- Enlace a Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
