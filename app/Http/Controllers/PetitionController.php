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

    // 3. MOSTRAR FORMULARIO DE CREAR
    public function create()
    {
        $categorias = Category::all();
        return view('peticiones.create', compact('categorias'));
    }

    // 4. GUARDAR PETICIÓN
    public function store(Request $request)
    {
        // Validamos los campos que vienen del formulario
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'recipient'   => 'required',
            'file'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable'
        ]);

        // Gestión de la imagen
        $imageName = null;
        if ($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('images'), $imageName);
        }

        // Guardar en la Base de Datos
        $petition = new Petition();
        $petition->title       = $request->input('title');
        $petition->description = $request->input('description');
        $petition->recipient   = $request->input('recipient');
        $petition->signers     = 0;
        $petition->status      = 'pending';
        $petition->user_id     = Auth::id();
        $petition->category_id = $request->input('category_id');
        $petition->image       = $imageName;

        $petition->save();

        return redirect()->route('peticiones.index');
    }
}
