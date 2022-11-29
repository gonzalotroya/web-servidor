<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;
use Illuminate\Support\Facades\DB;

class VideojuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensaje="Esta es la lista de consolas";
        /*
        $videojuego=[array("Cod","23","18+","Unos shurmanos que se disparan entre ellos"),
        array("Animal crossing","50","7+","Unos animales te obligan a trabajar de por vida en una isla"),
        array("Genshin impact","0","18+","Juego de waifus que quieren robarte todo tu dinero")];
        */
        $videojuegos=Videojuego::all();
        $mensaje="Aqui tenemos un listado";

        return view('videojuegos/index', [
        'videojuegos'=>$videojuegos,
        "mensaje"=>$mensaje
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videojuegos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $videojuego =new Videojuego;
        $videojuego -> titulo=$request ->input('titulo');
        $videojuego -> precio=$request ->input('precio');
        $videojuego -> pegi=$request ->input('pegi');
        $videojuego -> descripcion=$request ->input('descripcion');
        $videojuego -> save();

        return redirect('videojuegos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videojuego=Videojuego::find($id);
        return view('videojuegos/show',['videojuego'=>$videojuego]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videojuego=Videojuego::find($id);

        return view('videojuegos/edit',['videojuego'=>$videojuego]);
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
        $videojuego=Videojuego::find($id);

        $videojuego -> titulo =$request -> input('titulo');
        $videojuego -> precio =$request -> input('precio');
        $videojuego -> pegi =$request -> input('pegi');
        $videojuego -> descripcion =$request -> input('descripcion');

        $videojuego -> save();

        return redirect('videojuegos');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('videojuegos') -> where('id','=',$id) ->delete();
        
        return redirect('videojuegos');
    }

    /**
     * BUsca todos los juegos que contengan la palabra introducida
     * @param string $titulo
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $titulo=$request ->input('titulo');
        $videojuegos = DB::table('videojuegos') ->where('titulo','like','%'. $titulo .'%')->get();

        return view('videojuegos/search',
        [
            'videojuegos' => $videojuegos
        ]
        );
    }

}
