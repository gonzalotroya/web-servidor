<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=Categoria::all();
        return view('Categorias/index',['categorias'=>$categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();

        return view('Categorias/create',["productos"=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria =new Categoria();
        $categoria -> nombre=$request ->input('nombre');
        $categoria -> descripcion=$request ->input('descripcion');
        $categoria -> save();

        return redirect('Categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=Categoria::find($id);
        return view('Categorias/show',['Categorias'=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categoria::find($id);

        return view('Categorias/edit',['Categorias'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria=Categoria::find($id);

        $categoria -> nombre=$request ->input('nombre');
        $categoria -> descripcion=$request ->input('descripcion');
        $categoria -> save();

        return redirect('Categorias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('Categorias') -> where('id','=',$id) ->delete();
        
        return redirect('Categorias');
    }

    /**
     * BUsca todos los juegos que contengan la palabra introducida
     * @param string $titulo
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        /*
        $titulo=$request ->input('nombre');
        $videojuegos = DB::table('videojuegos') ->where('titulo','like','%'. $titulo .'%')->get();

        return view('videojuegos/search',
        [
            'videojuegos' => $videojuegos
        ]
        );
        */
    }
}
