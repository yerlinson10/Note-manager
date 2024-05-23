<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $CategoryModel;
    public function __construct()
    {
        $this->CategoryModel = new category();
        $this->middleware('auth');
    }
    public function index()
    {
        $categories =  Auth::user()->categories()->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Models import
        $CategoryModel = $this->CategoryModel;
        
        // Validate
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3',
            'color' => 'nullable|string',
        ]);
    
        // Assign validated data to the model
        $CategoryModel->name = $validatedData['name'];
        $CategoryModel->description = $validatedData['description'];
        $CategoryModel->id_user_creator = Auth::id();

        if (isset($request->color)) {
            $ColorandClass = explode(',', $request->color);
            $CategoryModel->class = $ColorandClass[0];
            $CategoryModel->color = $ColorandClass[1];
        }

        $CategoryModel->save();
    
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Auth::user()->categories()->where('id', $id)->first();
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Models import
        $CategoryModel = $this->CategoryModel;
        
        // Validate
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3',
            'color' => 'nullable|string',
        ]);

        $category = $CategoryModel::findOrFail($id);
            
        // Assign validated data to the model
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->id_user_creator = Auth::id();
        
        if (isset($request->color)) {
            $ColorandClass = explode(',', $request->color);
            $category->class = $ColorandClass[0];
            $category->color = $ColorandClass[1];
        }
        
        $category->save();
            
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $CategoryModel = $this->CategoryModel;
    
        try {
            $category = $CategoryModel::findOrFail($id);
            if (Auth::user()->id == $category->id_user_creator) {
                // Elimina las notas asociadas a la categoría
                $category->notes()->delete();
                $category->forceDelete();
                $previousUrl = url()->previous();
                return redirect($previousUrl)->with('success', 'La categoría ha sido eliminada correctamente.');
            } else {
                $previousUrl = url()->previous();
                return redirect($previousUrl)->with('error', 'Disculpe, pero usted no es el creador de la nota, ni tiene permiso de administrador para realizar esta acción.');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            $previousUrl = url()->previous();
            return redirect($previousUrl)->with('error', 'La nota no pudo ser encontrada o eliminada.');
        }
    }
}
