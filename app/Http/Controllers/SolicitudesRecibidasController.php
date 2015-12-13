<?php namespace Palencia\Http\Controllers;

use Illuminate\Http\Request;
use Palencia\Entities\Comunidades;
use Palencia\Entities\SolicitudesRecibidas;
use Palencia\Http\Requests;
use Palencia\Http\Requests\ValidateRulesSolicitudesRecibidas;

class SolicitudesRecibidasController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $titulo = "Listado de Solicitudes Recibidas";
        $solicitudesRecibidas = SolicitudesRecibidas::getSolicitudesRecibidas($request);
        $anyos = SolicitudesRecibidas::getAnyoSolicitudesRecibidasList();
        $semanas =Array();
        $cursillos = SolicitudesRecibidas::getCursillosSolicitudesRecibidasList();
        return view("solicitudesRecibidas.index", compact('solicitudesRecibidas', 'titulo', 'anyos', 'semanas', 'cursillos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Título Vista
        $titulo = "Nueva Solicitud Recibida";
        $solicitudRecibida = new SolicitudesRecibidas();
        $comunidades = Comunidades::getComunidadesList(false,false,"",true);
        $cursillos = array('0'=>'Cursillos...');

        //Vista
        return view('solicitudesRecibidas.nuevo',
            compact(
                'solicitudRecibida',
                'comunidades',
                'cursillos',
                'titulo'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ValidateRulesSolicitudesRecibidas $request)
    {
        //Creamos una nueva instancia al modelo.
        $solicitudRecibida = new SolicitudesRecibidas();
        //Asignamos valores traidos del formulario.
        $solicitudRecibida->comunidad_id = \Request::input('comunidad_id');
        $solicitudRecibida->cursillo_id = \Request::input('cursillo_id');
        $solicitudRecibida->aceptada = \Request::input('aceptada');
        $solicitudRecibida->activo = \Request::input('activo');

        //Intercepción de errores
        try {
            //Guardamos Los valores
            $solicitudRecibida->save();

        } catch (\Exception $e) {
            switch ($e->getCode()) {
                case 23000:
                    return redirect()->
                    route('solicitudesRecibidas.create')->
                    with('mensaje', 'La solicitud está ya dada de alta.');
                    break;
                default:
                    return redirect()->
                    route('solicitudesRecibidas.index')->
                    with('mensaje', 'Nueva Solicitud error ' . $e->getCode());
            }
        }
        //Redireccionamos a Solicitudes Recibidas (index)
        return redirect('solicitudesRecibidas')->
        with('mensaje', 'La solicitud se ha creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Título Vista
        $titulo = "Modificar Solicitud Recibida";
        $solicitudRecibida = SolicitudesRecibidas::find($id);
        $comunidades = Comunidades::getComunidadesList(false,false,"",true);
        $cursillos = array('0'=>'Cursillos...');

        //Vista
        return view('solicitudesRecibidas.modificar',
            compact(
                'solicitudRecibida',
                'comunidades',
                'cursillos',
                'titulo'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ValidateRulesSolicitudesRecibidas $request)
    {
        //Creamos una nueva instancia al modelo.
        $solicitudRecibida = SolicitudesRecibidas::find($id);
        $solicitudRecibida->comunidad_id = \Request::input('comunidad_id');
        $solicitudRecibida->cursillo_id = \Request::input('cursillo_id');
        $solicitudRecibida->aceptada = \Request::input('aceptada');
        $solicitudRecibida->activo = \Request::input('activo');
        //Intercepción de errores
        try {
            //Guardamos Los valores
            $solicitudRecibida->save();

        } catch (\Exception $e) {
            switch ($e->getCode()) {
                case 23000:
                    return redirect()->
                    route('solicitudesRecibidas.index')->
                    with('mensaje', 'La solicitud está ya dada de alta.');
                    break;
                default:
                    return redirect()->
                    route('solicitudesRecibidas.index')->
                    with('mensaje', 'Modificar Solicitud error ' . $e->getCode());
            }
        }
        //Redireccionamos a Solicitudes Enviadas (index)
        return redirect('solicitudesRecibidas')->
        with('mensaje', 'La solicitud ha sido modificada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $solicitudRecibida = SolicitudesRecibidas::find($id);
        try {
            $solicitudRecibida->delete();
        } catch (\Exception $e) {
            switch ($e->getCode()) {
                case 23000:
                    return redirect()->route('solicitudesRecibidas.index')->with('mensaje', 'La solicitud no se puede eliminar al tener registros asociados.');
                    break;
                default:
                    return redirect()->route('solicitudesRecibidas.index')->with('mensaje', 'Eliminar solicitud error ' . $e->getCode());
            }
        }
        return redirect()->route('solicitudesRecibidas.index')
            ->with('mensaje', 'La solicitud ha sido eliminada correctamente.');
    }

    /**
     *  Crea una nueva solicitud recibida
     *
     */

   /* public function crearSolicitudRecibida()
    {
        $cursillo = getUltimoCursillo();

        //Creamos una nueva instancia al modelo.
        $solicitudRecibida = new SolicitudesRecibidas();
        $solicitudRecibida->comunidad_id = $cursillo->comunidad_id;
        $solicitudRecibida->cursillo_id = $cursillo->id;

        //Intercepción de errores
        try {
            //Guardamos Los valores
            $solicitudRecibida->save();

        } catch (\Exception $e) {
            switch ($e->getCode()) {
                case 23000:
                    return redirect()->
                    route('solicitudesRecibidas.create')->
                    with('mensaje', 'La solicitud está ya dada de alta.');
                    break;
                default:
                    return redirect()->
                    route('solicitudesRecibidas.index')->
                    with('mensaje', 'Nueva Solicitud error ' . $e->getCode());
            }
        }

    }*/

}
