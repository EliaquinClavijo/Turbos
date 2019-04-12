<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicio;
use App\cliente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class servicioController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $servicio= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->get();
        return view('servicio.index',['servicio'=>$servicio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicio.create');
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
        
        $r1=$request->get('id');
        $r2=$request->get('dni');
        $r3=$request->get('nombre');
        $r4=$request->get('apellido_pate');
        $r5=$request->get('apellido_mate');
        $r6=$request->get('nro_celular');
        $r7=$request->get('fecha');
        $r8=$request->get('turbo');
        $r9=$request->get('oemi');
        $r10=$request->get('motor');
        $r11=$request->get('placa');
        $r12=$request->get('descripcion');
        $r13=$request->get('adelanto');
        $r14=$request->get('costo_total');


        $consulta=file_get_contents("http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI=".$r2);
        $partes = explode("|", $consulta);
        $ape_pate=$partes[0];
        $ape_mate=$partes[1];
        $nom=$partes[2];

        $cliente = cliente::find($r2);
        if($cliente==NULL){
            $cli = new cliente([
            'id'=>$r2,
            'nombre'=>$nom,
            'apellido_pate'=>$ape_pate,
            'apellido_mate'=>$ape_mate,
            'nro_celular'=>$r6,
            ]);
            $cli->save();
        }

        $servi = new servicio([
                    'id'=>$r1,
                    'fecha'=>$r7,
                    'turbo'=>strtoupper($r8),
                    'oemi'=>strtoupper($r9),
                    'motor'=>strtoupper($r10),
                    'placa'=>strtoupper($r11),
                    'descripcion'=>json_encode($r12),
                    'adelanto'=>$r13,
                    'costo_total'=>$r14,
                    'cliente_id'=>$r2,
                ]);
        $servi->save();
        return redirect('/servicio');

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
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('servicios.id',$id)
            ->first();
        $view=\View::make('servicio.show1',compact('ser'))->render();
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
        $acti=DB::select('select * from actividades');
        $ide=DB::table('servicios')->where('id',$id)->first();
        return view('servicio.edit',['ide'=>$ide,'acti'=>$acti]);
       
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
        $consulta=file_get_contents("http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI=".$request->get('dni'));
        $partes = explode("|", $consulta);
        $ape_pate=$partes[0];
        $ape_mate=$partes[1];
        $nom=$partes[2];

        $servicio = servicio::find($id);
             $servicio->dni=$request->get('dni');
             $servicio->nombre=$nom;
             $servicio->apellido_pate=$ape_pate;
             $servicio->apellido_mate=$ape_mate;
             $servicio->nro_celular=$request->get('nro_celular');
             $servicio->fecha=$request->get('fecha');
             $servicio->turbo=$request->get('turbo');
             $servicio->oemi=$request->get('oemi');
             $servicio->motor=$request->get('motor');
             $servicio->placa=$request->get('placa');
             $servicio->descripcion=json_encode($request->get('descripcion'));
             $servicio->adelanto=$request->get('adelanto');
             $servicio->costo_total=$request->get('costo_total');
             $servicio->save();

        return redirect('/servicio');
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
