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
    public function fileUpload(Request $req, $petition_id = null)
    {
        $file = $req->file('file');
        $fileModel = new File;
        $fileModel->petition_id = $petition_id;
        if ($req->file('file')) {
            //return $req->file('file');

            $filename = $fileName = time() . '_' . $file->getClientOriginalName();
            //      Storage::put($filename, file_get_contents($req->file('file')->getRealPath()));
            $file->move('petitions', $filename);

            //  Storage::put($filename, file_get_contents($request->file('file')->getRealPath()));
            //   $file->move('storage/', $name);


            //$filePath = $req->file('file')->storeAs('/peticiones', $fileName, 'local');
            //    $filePath = $req->file('file')->storeAs('/peticiones', $fileName, 'local');
            // return $filePath;
            $fileModel->name = $filename;
            $fileModel->file_path = $filename;
            $res = $fileModel->save();
            return $fileModel;
        }
        return 1;
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
}
