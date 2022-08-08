<?php

namespace App\Http\Controllers;
use App\Models\TodoApp;
use PDF;





use Illuminate\Http\Request;


class TodoAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $texto =trim($request->get('texto'));
        $todoApps = TodoApp::orderBy('id', 'DESC')->where('name','like','%'.$texto.'%')->paginate(8); 
        
        return view('admin.todo-app.index', compact('todoApps','texto'));
    }

   
    public function pdf()
    {
        $todoApps = TodoApp::orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('admin.todo-app.pdf', compact('todoApps'));
        return $pdf->download('todos-apps.pdf');
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request){

        $request->validate([
            'name' => 'required|string|max:20|unique:todo_apps',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser un texto',
            'name.max' => 'El campo nombre debe tener como máximo 20 caracteres',
            'name.unique' => 'El campo nombre ya existe',
            'description.required' => 'El campo descripción es obligatorio',
            'description.string' => 'El campo descripción debe ser un texto',
            'description.max' => 'El campo descripción debe tener como máximo 255 caracteres',
            'image.image' => 'El campo imagen debe ser una imagen',
            'image.mimes' => 'El campo imagen debe ser una imagen con extensiones jpeg,png,jpg,gif,svg',
            'image.max' => 'El campo imagen debe tener como máximo 2048 caracteres',
        ]);


        
        $todoApp = new TodoApp();
        if( $request->hasFile('image') ) {
            $file = $request->file('image');
            $destinationPath = 'storage/images/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
            $todoApp->image = $destinationPath . $filename;
        }
        $todoApp->name = request('name');
        $todoApp->description = request('description');
        $todoApp->status = "PENDIENTE";
        $todoApp->save();
        return redirect()->route('todo-apps.index');
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(todoApp $todoApp)
    {
        return view('admin.todo-app.edit', compact('todoApp'));
    }
    

    public function show( todoApp $todoApp ){

        return view('admin.todo-app.show', compact('todoApp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todoApp $todoApp)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:todo_apps,name,'.$todoApp->id,
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser un texto',
            'name.max' => 'El campo nombre debe tener como máximo 255 caracteres',
            'name.unique' => 'El campo nombre ya existe',
            'description.required' => 'El campo descripción es obligatorio',
            'description.string' => 'El campo descripción debe ser un texto',
            'description.max' => 'El campo descripción debe tener como máximo 255 caracteres',
            'image.image' => 'El campo imagen debe ser una imagen',
            'image.mimes' => 'El campo imagen debe ser una imagen con extensiones jpeg,png,jpg,gif,svg',
            'image.max' => 'El campo imagen debe tener como máximo 2048 caracteres',
        ]);
        if( $request->hasFile('image') ) {
            $file = $request->file('image');
            $destinationPath = 'storage/images/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
            $todoApp->image = $destinationPath . $filename;
        }
        $todoApp->name = request('name');
        $todoApp->description = request('description');
        $todoApp->status = request('status');
        $todoApp->save();
        return redirect('/todo-apps');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(todoApp $todoApp)
    {
        if (file_exists($todoApp->image)) {
            unlink($todoApp->image);
        }
        $todoApp->delete();
        return redirect('/todo-apps');
    }


    

}
