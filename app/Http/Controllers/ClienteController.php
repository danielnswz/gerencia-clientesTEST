<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Returns a Cliente's list
        $result= Cliente::all();
        return Datatables::of($result)
                ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $cliente = new Cliente;

            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            if(isset($request->correo))
                $cliente->correo = $request->correo;
            $cliente->edad = $request->nacimiento;

            $cliente->save();

        }catch (\Exception $ex) {
            $response = array('error' => $ex->getMessage());
            return \Response::json($response, 500);
        }
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
        return Cliente::find($id);
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
        $cliente = Cliente::find($id);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        if(isset($request->correo))
            $cliente->correo = $request->correo;
        $cliente->edad = $request->nacimiento;

        $cliente->save();

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
        try{
            $cliente = Cliente::find($id);

            $cliente->delete();

            return \Response::json(array('success' => 'true'));
        }catch(\Exception $ex) {
            $response = array('error' => $ex->getMessage());
            return \Response::json($response, 500);
        }
        
    }
}
