<?php

namespace App\Http\Controllers;

use App\turbo;

use Illuminate\Http\Request;

class TurboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turbos = turbo::all();
        return view('turbos.index',['turbos'=>$turbos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('turbos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $turbo = new turbo;
        $idturbo = $request->get('idturbo');
        $marcas = $request->get('marcas');
        $modelos = $request->get('modelos');
        $motores = $request->get('motores');
        $turbo->name = $idturbo;
        $turbo->marcas = '{"1": ""}';
        $turbo->modelos ='{"1": ""}';
        $turbo->motores = '{"1": ""}';

        if (!is_null($marcas)){
            $obj =(array) json_decode($turbo->marcas);
            $cant = count($obj);
            for ($i = 0; $i < count($marcas); $i++) {$obj[strval($cant+$i+1)] = $marcas[$i];}
            $arraymarcas = json_encode($obj);
            $turbo->marcas = $arraymarcas;
            echo "<script>console.log( 'Debug Objects: " .$arraymarcas. "' );</script>";
        }

        if (!is_null($modelos)){
            $obj =(array) json_decode($turbo->modelos);
            $cant = count($obj);
            for ($i = 0; $i < count($modelos); $i++) {$obj[strval($cant+$i+1)] = $modelos[$i];}
            $arraymodelos = json_encode($obj);
            $turbo->modelos = $arraymodelos;
            echo "<script>console.log( 'Debug Objects: " .$arraymodelos. "' );</script>";
        }

        if (!is_null($motores)){
            $obj =(array) json_decode($turbo->motores);
            $cant = count($obj);
            for ($i = 0; $i < count($motores); $i++) {$obj[strval($cant+$i+1)] = $motores[$i];}
            $arraymotores = json_encode($obj);
            $turbo->motores = $arraymotores;
            echo "<script>console.log( 'Debug Objects: " .$arraymotores. "' );</script>";
        }

        $turbo->save();

        return redirect('/turbos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $turbo = turbo::find($id);
        return view('turbos.turbo',['turbo'=>$turbo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = $request->get('marcas');
        $modelos = $request->get('modelos');
        $motores = $request->get('motores');
        
        echo "<script>console.log( 'Debug Objects: " . $marcas . "' );</script>";
        if (!is_null($marcas)){
        $arr = [];
        //for ($i = 0; $i < count($value); $i++) {$arr[$caracteristica[$i]] = $value[$i];}
        //$descr = json_encode($arr);
        }
    }

    public function editmarca($id)

    {
        $turbo = turbo::find($id);
        return view('turbos.marcasturbo',['turbo'=>$turbo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $turbo = turbo::find($id);
        $marcas = $request->get('marcas');
        $modelos = $request->get('modelos');
        $motores = $request->get('motores');
        
        
        


        if (!is_null($marcas)){
            $obj =(array) json_decode($turbo->marcas);
            $cant = count($obj);
            for ($i = 0; $i < count($marcas); $i++) {$obj[strval($cant+$i+1)] = $marcas[$i];}
            $arraymarcas = json_encode($obj);
            $turbo->marcas = $arraymarcas;
            echo "<script>console.log( 'Debug Objects: " .$arraymarcas. "' );</script>";
        }

        if (!is_null($modelos)){
            $obj =(array) json_decode($turbo->modelos);
            $cant = count($obj);
            for ($i = 0; $i < count($modelos); $i++) {$obj[strval($cant+$i+1)] = $modelos[$i];}
            $arraymodelos = json_encode($obj);
            $turbo->modelos = $arraymodelos;
            echo "<script>console.log( 'Debug Objects: " .$arraymodelos. "' );</script>";
        }

        if (!is_null($motores)){
            $obj =(array) json_decode($turbo->motores);
            $cant = count($obj);
            for ($i = 0; $i < count($motores); $i++) {$obj[strval($cant+$i+1)] = $motores[$i];}
            $arraymotores = json_encode($obj);
            $turbo->motores = $arraymotores;
            echo "<script>console.log( 'Debug Objects: " .$arraymotores. "' );</script>";
        }

        $turbo->update();

        return redirect('/turbos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function destroy(turbo $turbo)
    {
        //
    }
}
