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

    public $CategotyModel;
    public function __construct()
    {
        $this->CategotyModel = new category();
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
        $CategotyModel = $this->CategotyModel;
        
        // Validate
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3',
            'color' => 'nullable|string',
        ]);
    
        // Assign validated data to the model
        $CategotyModel->name = $validatedData['name'];
        $CategotyModel->description = $validatedData['description'];
        $CategotyModel->id_user_creator = Auth::id();

        if (isset($request->color)) {
            $ColorandClass = explode(',', $request->color);
            $CategotyModel->class = $ColorandClass[0];
            $CategotyModel->color = $ColorandClass[1];
        }

        $CategotyModel->save();
    
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
        $CategotyModel = $this->CategotyModel;
        
        // Validate
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3',
            'color' => 'nullable|string',
        ]);

        $category = $CategotyModel::findOrFail($id);
            
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
        //
    }
}
