<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\GenericController as GenericController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Eleccion;

use App\Models\Voto;
use Exception;
use Illuminate\Support\Facades\DB;

class EleccionController extends GenericController
{
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index()
 {
 $elecciones = Eleccion::all();
 $resp = $this->sendResponse($elecciones, "Listado de elecciones");
 return ($resp);
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
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
 public function store(Request $request)
 {
 $validacion = Validator::make($request->all(), [
 'periodo' => 'unique:eleccion|required|max:200',
 'fecha' =>'required',
 'fechaapertura' =>'required',
 'horaapertura' =>'required',
 'fechacierre' =>'required',
 'horacierre' =>'required',
 'observaciones' =>'required',
 
 ]);


 if ($validacion->fails())
 return $this->sendError("Error de validacion", $validacion->errors());


 $campos = array(
 'periodo' => $request->periodo,
 'fecha' => $request->fecha,
 'fechaapertura' => $request->fechaapertura,
 'horaapertura' => $request->horaapertura,
 'fechacierre' => $request->fechacierre,
 'horacierre' => $request->horacierre,
 'observaciones' => $request->observaciones,
 );



 $eleccion = Eleccion::create($campos);
 $resp = $this->sendResponse($eleccion,
 "Guardado...");
 return($resp);



 } //--- End store
 /**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function show($id)
 {
 //
 }
 /**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function edit($id)
 {
 
    $id = intval($id);
    $eleccion = Eleccion::find($id);
    return $this->send($eleccion,$id);

 }

 private function send($data,$id){
    if($data){
        $resp=$this->sendResponse($data,
        "Operacion exitosa...");
    }else{
        $resp =
        $this->sendError("No se encontro el candidato: $id");
    }
    return ($resp);

}


 /**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function update(Request $request, $id)
 {
 //
 }
 /**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function destroy($id)
 {
 
    $eleccion = Eleccion::find($id);
    DB::beginTransaction();
    try {
        if ($eleccion){
            Voto::where('eleccion_id','=',$id)->delete();
        }
        Eleccion::whereId($id)->delete();
        DB::commit();
    } catch(\Exception  $ex){
        DB::rollBack();
    }

    return $this->send($eleccion,$id);



 }
}
