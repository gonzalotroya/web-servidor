<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consolas;
use Illuminate\Support\Facades\DB;
class ConsolasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensaje="Esta es la lista de consolas";
        $consola=consolas::all();

        return view('consolas/index', [
        'mensaje'=> $mensaje,
        'consolas'=>$consola
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consolas/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consolas =new consolas;
        $consolas -> nombre=$request ->input('nombre');
        $consolas -> salida=$request ->input('salida');
        $consolas -> generacion=$request ->input('generacion');
        $consolas -> descripcion=$request ->input('descripcion');
        $consolas -> save();

        return redirect('consolas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consola=consolas::find($id);
        return view('consolas/show',['consolas'=>$consola]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consola=consolas::find($id);

        return view('consolas/edit',['consolas'=>$consola]);
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
        $consola=consolas::find($id);

        $consola -> nombre =$request -> input('nombre');
        $consola -> salida =$request -> input('salida');
        $consola -> generacion =$request -> input('generacion');
        $consola -> descripcion =$request -> input('descripcion');

        $consola -> save();

        return redirect('consolas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('consolas') -> where('id','=',$id) ->delete();
        
        return redirect('consolas');
    }

    public function search(Request $request)
    {
        $nombre=$request ->input('nombre');
        $consola = DB::table('consolas') ->where('nombre','like','%'. $nombre .'%')->get();

        return view('consolas/search',
        [
            'consolas' => $consola
        ]
        );
    }
}
