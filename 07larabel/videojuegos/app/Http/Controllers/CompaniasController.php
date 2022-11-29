<?php

namespace App\Http\Controllers;
use App\Models\companias;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompaniasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensaje="Esta es la lista de consolas";
        
        $companias=Companias::all();
        $mensaje="Aqui tenemos un listado";

        return view('companias/index', [
        'companias'=>$companias,
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
        return view('companias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companias =new companias;
        $companias -> nombre=$request ->input('nombre');
        $companias -> sede=$request ->input('sede');
        $companias -> fecha_fundacion=$request ->input('fecha_fundacion');
        $companias -> save();

        return redirect('companias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companias=companias::find($id);
        return view('companias/show',['companias'=>$companias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companias=companias::find($id);
        return view('companias/edit',['companias'=>$companias]);
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
        $companias=companias::find($id);
        $companias -> nombre =$request -> input('nombre');
        $companias -> sede =$request -> input('sede');
        $companias -> fecha_fundacion =$request -> input('fecha_fundacion');

        $companias -> save();

        return redirect('companias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('companias') -> where('id','=',$id) ->delete();
        
        return redirect('companias');
    }
}
