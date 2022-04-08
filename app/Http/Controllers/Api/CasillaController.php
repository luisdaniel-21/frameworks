<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\GenericController as GenericController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Casilla;
use App\Models\Votocandidato;
use Exception;
use Illuminate\Support\Facades\DB;
class CasillaController extends GenericController
{
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index()
 {
 $casillas = Casilla::all();
 $resp = $this->sendResponse($casillas, "Listado de casillas");
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
 'ubicacion' => 'unique:casilla|required|max:200'

 ]);


 if ($validacion->fails())
 return $this->sendError("Error de validacion", $validacion->errors());



 $campos = array(
 //'id' => $request->id,
 'ubicacion' => $request->ubicacion,
 );



 $casilla = Casilla::create($campos);
 $resp = $this->sendResponse($casilla,
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
    $casilla = Casilla::find($id);
    return $this->send($casilla,$id);
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
    
    $casilla = Casilla::find($id);
    Casilla::WhereId($id)->delete();
    return $this->send($casilla, $id);


   /* $casilla = Casilla::find($id);
    DB::beginTransaction();
    try {
        if ($casilla){
            Votocandidato::where('voto_id','=',$id)->delete();
        }
        Casilla::whereId($id)->delete();
        DB::commit();
    } catch(\Exception  $ex){
        DB::rollBack();
    }

    return $this->send($casilla,$id);*/




 }
}
