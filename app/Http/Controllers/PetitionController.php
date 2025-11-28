<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PetitionController extends Controller
{
    // 1. LISTADO DE PETICIONES
    public function index()
    {
        $petitions = Petition::all();
        return view('peticiones.index', compact('petitions'));
    }

    // 2. VER UNA SOLA PETICIÓN
    public function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view('peticiones.show', compact('petition'));
    }

    // Función auxiliar para subir archivos
    private function fileUpload(Request $request, $petition_id)
    {
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('images');
                $file->move($path, $filename);

                // Actualizamos la petición con el nombre de la imagen
                $petition = Petition::findOrFail($petition_id);
                $petition->image = $filename;
                $petition->save();

                return true;
            }
            return true; // Si no hay foto, también devolvemos true porque no es error
        } catch (\Exception $e) {
            return false;
        }
    }

    // 3. MOSTRAR FORMULARIO DE CREAR
    public function create()
    {
        $categorias = Category::all();
        return view('peticiones.create', compact('categorias'));
    }

    // 4. GUARDAR PETICIÓN
    // Guarda la petición en la base de datos (Estilo Profesora)
    public function store(Request $request)
    {
        // CORRECCIÓN: Usamos $request->validate en vez de $this->validate
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'recipient'   => 'required',
            'category_id' => 'required',
            'file'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        try {
            $category = Category::findOrFail($input['category_id']);
            $user = Auth::user();

            $petition = new Petition($input);
            $petition->category()->associate($category);
            $petition->user()->associate($user);

            $petition->signers = 0;
            $petition->status = 'pending';

            $res = $petition->save();

            if ($res) {
                $res_file = $this->fileUpload($request, $petition->id);

                if ($res_file) {
                    // CORRECCIÓN: Nombres de ruta en inglés para coincidir con web.php
                    return redirect()->route('petitions.mine');
                }

                return back()->withError('Error subiendo la imagen')->withInput();
            }

        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    // Función para "Mis Peticiones"
        public function listMine(Request $request)
        {
            try {
                // 1. Obtenemos el ID del usuario conectado
                $user = Auth::user();

                // 2. Buscamos en la BD solo las peticiones de este usuario
                // Usamos 'paginate(5)' para que salgan de 5 en 5, como en tu foto
                $petitions = Petition::where('user_id', $user->id)->paginate(5);

            } catch (\Exception $exception) {
                // Si falla, volvemos atrás con el error
                return back()->withError($exception->getMessage())->withInput();
            }

            // 3. Reutilizamos la vista 'index' pero solo con sus peticiones
            return view('peticiones.index', compact('petitions'));
        }
}
