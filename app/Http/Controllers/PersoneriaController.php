<?php

namespace SisArchivos\Http\Controllers;

use Illuminate\Http\Request;
use SisArchivos\Http\Requests;
use SisArchivos\Personeria;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisArchivos\Http\Requests\PersoneriaFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PersoneriaController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   



        if($request)
        {
            $query = trim($request->get('searchText'));
            $personeria=DB::table('personeria')
            ->where('nombre','like','%'.$query.'%')
            // ->orwhere('hoja_ruta','like','%'.$query.'%')
            // ->orwhere('domicilio','like','%'.$query.'%')
            ->where('estado', '=', '1')
            ->orderBy('idpersoneria','desc')
            ->paginate(4);

            return view('archivos.personeria.index',["personeria"=>$personeria,"searchText"=>$query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.personeria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersoneriaFormRequest $request)
    {
        $this->validate($request, ['archivo' =>'mimes:jpeg,png,pdf,docx,doc|max:10240']);

        $personeria = new Personeria;
        $personeria->hoja_ruta=$request->get('hoja_ruta');
        $personeria->nombre=$request->get('nombre');

        $personeria->fecha_creacion=$request->get('fecha_creacion');


        $personeria->representante_legal=$request->get('representante_legal');
        $personeria->institucion_solicitante=$request->get('institucion_solicitante');
        $personeria->domicilio=$request->get('domicilio');

        // $mytime = Carbon::now('America/Caracas');
        // $personeria->fecha_hora=$mytime->toDateTimeString();

        // $personeria->descripcion=$request->get('descripcion');
        $personeria->estado='1';

        if(Input::hasFile('archivo'))
        {
            $file=Input::file('archivo');
            $file->move(public_path().'/archivos/personerias',$file->getClientOriginalName());
            $personeria->archivo=$file->getClientOriginalName();
        }
       
        
        $personeria->save();
        return redirect::to('archivos/personeria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("archivos.personeria.show",["personeria"=>personeria::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personeria=Personeria::findOrFail($id);
        return view("archivos.personeria.edit",["personeria"=>personeria::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersoneriaFormRequest $request, $id)
    {
        $this->validate($request, ['archivo' =>'mimes:jpeg,png,pdf,docx,doc|max:10240']); 
        $personeria=Personeria::findOrFail($id);

        $personeria->hoja_ruta=$request->get('hoja_ruta');
        $personeria->nombre=$request->get('nombre');

        $personeria->fecha_creacion=$request->get('fecha_creacion');

        $personeria->representante_legal=$request->get('representante_legal');
        $personeria->institucion_solicitante=$request->get('institucion_solicitante');
        $personeria->domicilio=$request->get('domicilio');


        // $mytime = Carbon::now('America/Caracas');
        // $personeria->fecha_hora=$mytime->toDateTimeString();

        // $personeria->descripcion=$request->get('descripcion');

        if(Input::hasFile('archivo'))
        {
            $file=Input::file('archivo');
            $file->move(public_path().'/archivos/personerias',$file->getClientOriginalName());
            $personeria->archivo=$file->getClientOriginalName();
        }
        $personeria->update();
        return redirect::to('archivos/personeria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $personeria=Personeria::findOrFail($id);
         $personeria->estado='0';
         $personeria->update();

          return redirect::to('archivos/personeria');
    }

    public function downloadFile()
    {
        $personeria=DB::table('personeria')->get();
        return view('archivos/personeria.index',compact('personeria'));
    }

}
