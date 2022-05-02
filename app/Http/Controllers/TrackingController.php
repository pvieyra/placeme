<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\State;
use App\Models\Tracking;
use App\Models\Operation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\TrackingRequest;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class TrackingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request){
      $customerName = $request['customer_name'];
      $buildingAddress = $request['address_name'];
      $buildingSuburb = $request['suburb_name'];
      $state = $request['state'];
      $startDate = $request['start_date'];
      $endDate = $request['end_date'];
      if(isset($endDate)){
        $endDate = Carbon::createFromFormat('Y-m-d',$endDate)->addDay();
      }

      $states = State::all();

      $trackings =  Tracking::join('users', 'trackings.user_id', '=', 'users.id')
        ->join('customers', 'trackings.customer_id', '=', 'customers.id')
        ->join('buildings', 'trackings.building_id', '=', 'buildings.id')
        ->join('states', 'trackings.state_id', '=', 'states.id')
        ->where('trackings.user_id', '=', auth()->user()->id )
        ->when($customerName, function($query) use($customerName){
          $query->where('customers.name','like' , '%'. $customerName .'%')
          ->orWhere('customers.last_name', 'like', '%'. $customerName .'%');
        })
        ->when($buildingAddress, function($query) use($buildingAddress){
          $query->where('buildings.address','like' , '%'.$buildingAddress.'%');
        })
        ->where('buildings.suburb','like' , '%'.$buildingSuburb.'%')
        ->when($startDate && $endDate  ,function($query) use($startDate, $endDate){
          return $query->whereBetween('trackings.created_at', [ $startDate, $endDate]);
        })
        ->when(($startDate && is_null($endDate)) ,function($query) use($startDate){
          $query->whereDate('trackings.created_at', [ $startDate]);
        })
        ->when($state, function($query) use($state){
          $query->where('states.id','=' , $state);
        })
        ->select('trackings.id',
          DB::raw('CONCAT(customers.name, " ", customers.last_name) as cliente'),
          'buildings.address',
          DB::raw('CONCAT(buildings.address, " ", buildings.suburb) as direccion'),
          'states.color as color','states.name as estado',
          DB::raw('trackings.created_at as creado'),'trackings.updated_at as actualizado')
        ->orderBy('trackings.created_at', 'desc')
        ->paginate(10);
        // si el usuario es admin, mostrar todos los trackings de todos los asesores.
        return view('trackings.index', compact('trackings', 'states'));
    }


    /** all trackings for Admin user */
    public function indexAdminTrackings(Request $request){
      $customerName = $request['customer_name'];
      $asesorAccount = $request['asesor_account'];
      $buildingAddress = $request['address_name'];
      $buildingSuburb = $request['suburb_name'];
      $state = $request['state'];
      $startDate = $request['start_date'];
      $endDate = $request['end_date'];
      if(isset($endDate)){
        $endDate = Carbon::createFromFormat('Y-m-d',$endDate)->addDay();
      }
      $states = State::all();
      $trackings =  Tracking::join('users', 'trackings.user_id', '=', 'users.id')
        ->join('customers', 'trackings.customer_id', '=', 'customers.id')
        ->join('buildings', 'trackings.building_id', '=', 'buildings.id')
        ->join('states', 'trackings.state_id', '=', 'states.id')
        ->when($customerName, function($query) use($customerName){
          $query->where('customers.name','like' , '%'. $customerName .'%')
            ->orWhere('customers.last_name', 'like', '%'. $customerName .'%');
        })
        ->when($asesorAccount, function($query) use($asesorAccount){
          $query->where('users.email','like' , '%'. $asesorAccount .'%');
        })
        ->when($buildingAddress, function($query) use($buildingAddress){
          $query->where('buildings.address','like' , '%'.$buildingAddress.'%');
        })
        ->where('buildings.suburb','like' , '%'.$buildingSuburb.'%')
        ->when($startDate && $endDate  ,function($query) use($startDate, $endDate){
          return $query->whereBetween('trackings.created_at', [ $startDate, $endDate]);
        })
        ->when(($startDate && is_null($endDate)) ,function($query) use($startDate){
          $query->whereDate('trackings.created_at', [ $startDate]);
        })
        ->when($state, function($query) use($state){
          $query->where('states.id','=' , $state);
        })
        ->select('trackings.id','users.email as user_email',
          DB::raw('CONCAT(customers.name, " ", customers.last_name) as cliente'),
          'buildings.address',
          DB::raw('CONCAT(buildings.address, " ", buildings.suburb) as direccion'),
          'states.color as color','states.name as estado',
          DB::raw('trackings.created_at as creado'),'trackings.updated_at as actualizado')
        ->orderBy('trackings.created_at', 'desc')
        ->paginate(5);
      // si el usuario es admin, mostrar todos los trackings de todos los asesores.
      return view('trackings.index-admin', compact('trackings', 'states'));
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
            'active'=> 1,
            'checked'=> 0,
          ]);
          $comment = Comment::create([
            'tracking_id' => $tracking->id,
            'state_id'=> 1,
            'subject' => 'Inicio del seguimiento.',
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id){
      $tracking = Tracking::findOrFail( $id );
      $lastUpdate = $tracking->updated_at;
      if( $tracking->isDateTrackingActive() === false){
        $tracking->active = 0;
        $tracking->updated_at = $lastUpdate;
        $tracking->save();
      }
      return view('trackings.show', compact('tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracking $tracking){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracking $tracking){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking){
        //
    }

    public function updateState(Request $request){
      //validar que solo el usuario pueda actualizar.
      //Validar que el usuario admin no pueda modificar.
      $tracking = Tracking::findOrFail($request['tracking_id']);
      $data = $request->validate([
        'tracking_id' => 'required',
        'state_id' => 'required|numeric'
      ]);
      $tracking->state_id = $request['state_id'];
      $tracking->save();
      return redirect()->back();
    }

    //para trabajo con livewire
    public function duplicate(){
      return view('trackings.duplicate');
    }
    public function allDuplicates(){
      return view('trackings.all-duplicates');
    }

}
