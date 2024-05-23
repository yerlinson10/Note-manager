<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public $NoteModel;
    public function __construct()
    {
        $this->NoteModel = new notes();
        $this->middleware('auth');
    }
    public function index()
    {
        $notes = Auth::user()->notes()->with('category')->get();

        return view('dashboard', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Auth::user()->categories;
        return view('note.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Models import
        $NoteModel = $this->NoteModel;
    
        // Validate
        $validatedData = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'category' => 'array',
            'category.*' => 'integer|exists:categories,id',
        ]);
    
        // Assign validated data to the model
        $NoteModel->title = $validatedData['title'];
        $NoteModel->content = $validatedData['content'];
        $NoteModel->id_user_creator = Auth::id();
    
        if (!empty($validatedData['category'])) {
            $NoteModel->id_category = $validatedData['category'][0];
        }
        
        $NoteModel->save();
    
        return redirect()->route('dashboard');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
