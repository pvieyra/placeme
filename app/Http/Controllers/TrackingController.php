<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\Tracking;
use App\Models\Operation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\TrackingRequest;

class TrackingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(){
        //si el usuario es asesor se muestran solo los trackings del asesor
        $trackings = auth()->user()->trackings()->paginate(10);
        // si el usuario es admin, mostrar todos los trackings de todos los asesores.
        return view('trackings.index', compact('trackings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(){
      $operations = Operation::all();
      return view('trackings.create', compact('operations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
      $messages = [
        'name.required' => "El nombre del cliente es obligatorio.",
        'last_name.required' => "El apellido paterno es obligatorio.",
        'email.email' => "Este campo debe ser un correo valido.",
        'phone.required' => "El telefono del cliente es obligatorio.",
        'building_id.required' => "La propiedad es un campo obligatorio.",
        'operation_id.required' => "El campo tipo de operacion es obligatorio.",
        'contact_type.required' => "El tipo de contacto es un campo obligatorio.",
        'comments.required' => "Los comentarios son obligatorios.",
      ];

      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'email',
        'phone' => 'required',
        'building_id' => 'required',
        'operation_id' => 'required',
        'contact_type' => 'required',
        'comments' => 'required',
      ],$messages);

      if ($validator->passes()) {
        //Guardar el seguimiento.
        try {
          DB::beginTransaction();
          //Primero se crea al cliente
          //Se guarda seguimiento
          //se guarda commentario
          $customer = Customer::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'second_last_name' => $request->second_last_name,
            'email' => $request->email,
            'phone' => $request->phone,
          ]);
          $tracking = Tracking::create([
            'user_id' => auth()->user()->id,
            'customer_id' => $customer->id,
            'building_id' => $request->building_id,
            'operation_id' => $request->operation_id,
            'state_id'=> 1,
            'numero_interior_unidad' => $request->numero_interior_unidad,
            'contact_type' => $request->contact_type,
            'inmobiliaria_name' => $request->inmobiliaria_name,
            'nombre_asesor' => $request->nombre_asesor,
            'celular_asesor' => $request->celular_asesor,
          ]);
          $comment = Comment::create([
            'tracking_id' => $tracking->id,
            'state_id'=> 1,
            'comments'=> $request->comments,
            'tracking_date' => Carbon::now(),
          ]);
          DB::commit();
          return response()->json([
            'success'=> "El seguimiento ha sido creado",
            'tracking' => $tracking->id
          ]);
        } catch(  Exception $exception ){
          DB::rollback();
          return $exception->getMessage();
        }
      }
      return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
