<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Operation;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\TrackingRequest;

class TrackingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
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
        'operation_id.required' => "El campo tipo de operacion es obligatorio",
      ];
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'operation_id' => 'required',
        'last_name' => 'required'
      ],$messages);

      if ($validator->passes()) {
        return response()->json(['success'=>'Added new records.']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
      //return response()->json(['success' => "Nuevo seguimiento creado"]);
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
