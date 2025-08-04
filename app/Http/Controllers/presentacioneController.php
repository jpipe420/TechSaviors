<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Caracteristica;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePresentacioneRequest;
use App\Models\Presentacione;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class presentacioneController extends Controller
{
    public function index(){

        $presentaciones = Presentacione::with('caracteristica')->get();

        return view('presentacione.index',['presentaciones' => $presentaciones]);
    }

    public function create(){
        return view('presentacione.create');
    }

    public function store(StorePresentacioneRequest $request){
        try{

            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->presentacione()->create(['caracteristica_id'=> $caracteristica->id]); 

            DB::commit();
            
        }catch(Exception $e){
            DB::rollBack();

        }

        return redirect()->route('presentaciones.index')->with('success','Presentacion agregada');
    }

    public function show(string $id){
        //
    }

    public function edit(Presentacione $presentacione){
        return view('presentacione.edit',['presentacione' => $presentacione]);
    }

    public function update(UpdateCategoriaRequest $request, Presentacione $presentacione ){
        Presentacione::where('id',$presentacione->caracteristica->id)->update($request->validated());

        return redirect()->route('presentacione.index')->with('success','Presentacion editada');
      
    }

    public function destroy(string $id){
        //
    }


}
