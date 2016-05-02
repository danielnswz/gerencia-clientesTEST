<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of "clientes".
     * Muestra una lista de "clientes".
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Returns a Cliente's list
        $result= Cliente::all();
        foreach ($result as $cliente) {
            $cliente->edad = $this->CalcularEdad($cliente->edad);
        }
        return Datatables::of($result)
                ->make();
    }

    /**
     * Store a newly created "cliente" in storage.
     * Almacena un "cliente" recien creado en la BD.
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
            $cliente->edad = $request->edad;

            $cliente->save();

            return \Response::json(array('success' => 'true'));

        }catch (\Exception $ex) {
            $response = array('error' => $ex->getMessage());
            return \Response::json($response, 500);
        }
    }

    /**
     * Display the specified "cliente".
     * Muestra el "cliente" especificado.
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
     * Update the specified "cliente" in storage.
     * Actualiza el "cliente" especificado en BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{
            $cliente = Cliente::find($id);

            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            if(isset($request->correo))
                $cliente->correo = $request->correo;
            $cliente->edad = $request->edad;

            $cliente->save();

            return \Response::json(array('success' => 'true'));

        }catch (\Exception $ex) {
            $response = array('error' => $ex->getMessage());
            return \Response::json($response, 500);
        }

    }

    /**
     * Remove the specified "cliente" from storage.
     * Elimina el "cliente" especificado de BD.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $cliente = Cliente::find($id);
            $cliente->delete();

            return \Response::json(array('success' => 'true'));
        }catch(\Exception $ex) {
            $response = array('error' => $ex->getMessage());
            return \Response::json($response, 500);
        }
    }

    /**
     * Calculates age from the specified date to real date.
     * Calcula la edad desde una fecha especificada hasta la fecha actual.
     *
     * @param  string  $fecha
     * @return int
     */
    public function CalcularEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
}
