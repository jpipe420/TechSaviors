<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Support\Facades\DB;// Importar la fachada DB para manejar transacciones
use App\Http\Requests\StoreCategoriaRequest;// Importar la solicitud personalizada para validar los datos de la categoría
use App\Models\Caracteristica;// Importar el modelo Caracteristica
use Illuminate\Http\Request;// Importar la clase Request para manejar las solicitudes HTTP
use App\Models\Categoria;// Importar el modelo Categoria
use Illuminate\Session\Store;// Importar la clase Store para manejar sesiones

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::with('caracteristica')->latest()->get(); // Obtener todas las categorías con sus características
        //dd($categorias); // Depurar para ver las categorías obtenidas
        // Puedes pasar las categorías a la vista si es necesario
        return view('categoria.index', ['categorias' => $categorias]); // para mostrar la vista de categorías
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');  // para mostrar la vista de creación de categorías
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        try {
            DB::beginTransaction();// Iniciar una transacción para asegurar la integridad de los datos
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->categoria()->create([
                'caracteristica_id' => $caracteristica->id
            ]);

            DB::commit();// Confirmar la transacción si todo va bien

        }catch(Exception $e){
            DB::rollBack();// Revertir la transacción si algo sale mal
            
        }



        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente');

        
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
    public function edit(Categoria $categoria)
    {
         return view('categoria.edit',['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria )
    {
        Caracteristica::where('id',$categoria->caracteristica->id)
        ->update($request->validated());

        return redirect()->route('categorias.index')->with('success','Categoria editada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message='';
        $categoria = Categoria::find($id);
        if($categoria->caracteristica->estado == 1){
            Caracteristica::where('id',$categoria->caracteristica->id)
        ->update([
            'estado' => 0
            ]);
            $message ='Categoria eliminada';

        }else{
            Caracteristica::where('id',$categoria->caracteristica->id)
        ->update([
            'estado' => 1
            ]);
            $message ='Categoria restaurada';

        }
        
        

        return redirect()->route('categorias.index')->with('success',$message);
    }
}
