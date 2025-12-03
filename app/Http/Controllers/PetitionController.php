<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\Category;
use App\Models\File; // <--- 1. FALTABA ESTO
use Illuminate\Support\Facades\Auth;

class PetitionController extends Controller
{
    // 1. LISTADO
    public function index()
    {
        // Ordenamos por fecha para ver las nuevas primero
        $petitions = Petition::orderBy('created_at', 'desc')->paginate(10);
        return view('peticiones.index', compact('petitions'));
    }

    // 2. DETALLE
    public function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view('peticiones.show', compact('petition'));
    }

    // 3. FORMULARIO
    public function create()
    {
        $categorias = Category::all();
        return view('peticiones.create', compact('categorias'));
    }

    // 4. GUARDAR (STORE)
    public function store(Request $request)
    {
        // Validación corregida
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'recipient'   => 'required',
            'category_id' => 'required', // <--- 2. CORREGIDO (antes ponía 'category')
            'file'        => 'required|image|max:2048',
        ]);

        try {
            $input = $request->all();

            // Buscar categoría y usuario
            $category = Category::findOrFail($input['category_id']);
            $user = Auth::user();

            // Crear objeto Petición
            $petition = new Petition($input);
            $petition->category()->associate($category);
            $petition->user()->associate($user);

            // Valores por defecto
            $petition->signers = 0; // <--- 3. CORREGIDO (antes 'signeds')
            $petition->status = 'pending';

            $petition->save();

            // Subir imagen
            $this->fileUpload($request, $petition->id);

            return redirect()->route('petitions.mine'); // Redirige a "Mis peticiones"

        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    // Función auxiliar para subir archivos
    // Función auxiliar para subir archivos (CON AUTO-CREACIÓN DE CARPETA)
    public function fileUpload(Request $req, $petition_id)
    {
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = public_path('petitions'); // Asegúrate que coincide con tu carpeta real

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);

            // 1. Guardar en tabla FILES (Lo que ya hacías)
            $fileModel = new File;
            $fileModel->petition_id = $petition_id;
            $fileModel->name = $filename;
            $fileModel->file_path = $filename;
            $fileModel->save();

            // 2. ¡LO QUE FALTABA! Guardar en tabla PETITIONS
            // Sin esto, la vista siempre pensará que no hay foto
            $petition = Petition::find($petition_id);
            $petition->image = $filename;
            $petition->save();

            return true;
        }
        return false;
    }

    // Mis Peticiones
    public function listMine(Request $request)
    {
        try {
            $user = Auth::user();
            $petitions = Petition::where('user_id', $user->id)->paginate(5);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('peticiones.index', compact('petitions'));
    }

    // Mis Firmas
    public function listSigned(Request $request)
    {
        try {
            $user = Auth::user();
            $petitions = $user->signatures()->paginate(5);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('peticiones.index', compact('petitions'));
    }

    // Función para FIRMAR
    public function sign($id)
    {
        $petition = Petition::findOrFail($id);
        $user = Auth::user();

        // Comprobamos si el usuario YA está en la lista de firmas
        // Usamos 'signatures()' que es el nombre nuevo que acabamos de poner en el Modelo
        if (!$petition->signatures()->where('user_id', $user->id)->exists()) {

            // 1. Guardar la firma en la tabla intermedia
            $petition->signatures()->attach($user->id);

            // 2. Sumar 1 al contador visual
            $petition->increment('signers');
        }

        return back(); // Recargar la página
    }
}
