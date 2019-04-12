<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\reclamo;
class reclamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total= DB::table('servicios')
            ->join('clientes','servicios.cliente_id', '=','clientes.id')
            ->join('reclamos','servicios.id', '=', 'reclamos.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular','reclamos.*')
            ->get();
    
        
        return view('reclamos.index',['total'=>$total]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ser= DB::table('servicios')
            ->join('clientes','servicios.cliente_id', '=','clientes.id')
            ->join('reclamos','servicios.id', '=', 'reclamos.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular','reclamos.*')
            ->where('servicios.id',$id)
            ->first();
        $view=\View::make('reclamos.show',compact('ser'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper('A4');
        return $pdf->stream('informe'.'.pdf');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $recla=DB::table('reclamos')->where('id',$id)->first();
        $ide= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('servicios.id',$id)
            ->first();
        return view('reclamos.edit',['ide'=>$ide,'recla'=>$recla]);
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
        //
        $ide=DB::table('reclamos')->where('id',$id)->first();

        $estado='ACTIVO';
        if ($request->get('estado')=="") {
           $estado='DESACTIVADO';
        }
        if($ide==NULL){
         $recla = new reclamo([
                    'id'=>$request->get('id'),
                    'text'=>strtoupper($request->get('text')),
                    'fecha_reclamo'=>$request->get('fecha_reclamo'), 
                    'estado'=>'ACTIVO',         
                ]);
         $recla->save();
         
        }
        else{
             $obs= reclamo::find($id);
             $obs->id=$request->get('id');
             $obs->text=strtoupper($request->get('text'));
             $obs->fecha_reclamo=$request->get('fecha_reclamo');
             $obs->estado=$estado;
             $obs->save();

        }
       return redirect('/reclamos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
