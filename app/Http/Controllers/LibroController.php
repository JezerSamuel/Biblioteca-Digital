<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    //

    public function index()
    {
        $libros = Libro::all();
        return view('listado', compact('libros'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $libros = Libro::where('nombre', 'LIKE', "%$query%")
                        ->orWhere('autor', 'LIKE', "%$query%")
                        ->get();
        return view('listado', compact('libros'));
    }

    public function show()
    {
        $libros = Libro::all();
        return view('administrar', compact('libros'));
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required|date',
            'editorial' => 'required',
            'portada' => 'required|url',
        ]);

        // Crea un nuevo libro con los datos del formulario
        $libro = new Libro();
        $libro->nombre = $request->nombre;
        $libro->autor = $request->autor;
        $libro->fecha_publicacion = $request->fecha_publicacion;
        $libro->editorial = $request->editorial;
        $libro->portada = $request->portada;
        $libro->save();

        // Redirecciona al usuario de vuelta al formulario de creación con un mensaje de éxito
        return redirect()->route('listado.index')->with('success', 'Libro creado exitosamente.');
    }

    public function create()
    {
        return view('libros.create');
    }

    public function editar($id)
    {
        $libro = Libro::findOrFail($id); 
        return view('edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $libro->nombre = $request->input('nombre');
        $libro->autor = $request->input('autor');
        $libro->fecha_publicacion = $request->input('fecha_publicacion');
        $libro->editorial = $request->input('editorial');
        $libro->portada = $request->input('portada');

        $libro->save();

        return redirect()->route('administrar')->with('success', 'Libro actualizado exitosamente.');
    }

    public function borrar($id)
    {
        
        // Encuentra el libro por su ID
        $libro = Libro::findOrFail($id);

        // Borra el libro
        $libro->delete();

        // Redirige de vuelta con un mensaje
        return redirect()->route('administrar')->with('success', 'Libro eliminado exitosamente.');
    }
}
