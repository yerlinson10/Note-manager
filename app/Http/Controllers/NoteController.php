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
        $notes = Auth::user()
                ->notes()
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->get();
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
            'category' => 'array|nullable',
        ]);
    
        // Assign validated data to the model
        $NoteModel->title = $validatedData['title'];
        $NoteModel->content = $validatedData['content'];
        $NoteModel->tags = $request->tags;
        $NoteModel->id_user_creator = Auth::id();
    
        if (!empty($validatedData['category'])) {
            $NoteModel->id_category = $validatedData['category'][0];
        }else {
            $note->id_category = null;
        }
        
        $NoteModel->save();
    
        return redirect()->route('dashboard');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Auth::user()->notes()->with('category')->where('id', $id)->first();
        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Auth::user()->categories;
        $note = Auth::user()->notes()->with('category')->where('id', $id)->first();
        return view('note.edit', compact('note', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Models import
        $NoteModel = $this->NoteModel;

        $note = $NoteModel::findOrFail($id);

        // Validate data
        $validatedData = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'category' => 'nullable|array',
            'category.*' => 'integer|exists:categories,id',
        ]);

        // Update note properties
        $note->title = $validatedData['title'];
        $note->content = $validatedData['content'];
        $note->tags = $request->tags;

        // Update category if provided
        if (isset($validatedData['category'])) {
            $note->id_category = $validatedData['category'][0];
        } else {
            $note->id_category = null;
        }

        $note->save();

        // Redirect after successful update
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $NoteModel = $this->NoteModel;

        try {
            $note = $NoteModel::findOrFail($id);
            if(Auth::user()->id == $note->id_user_creator)
            {
                $note->delete();
                $previousUrl = url()->previous();
                return redirect($previousUrl)->with('success', 'La nota ha sido eliminado correctamente.');
            }else
            {
                $previousUrl = url()->previous();
                return redirect($previousUrl)->with('error', 'Disculpe, pero usted no es el creador de la nota, ni tiene permiso de administrador para realizar esta acción.');
            }
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {

            $previousUrl = url()->previous();
            return redirect($previousUrl)->with('error', 'La nota no pudo ser encontrado o eliminada.');
        }
    }
}
