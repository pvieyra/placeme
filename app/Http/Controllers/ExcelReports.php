<?php

namespace App\Http\Controllers;

use App\Exports\BuildingTrackingsExport;
use App\Exports\TrackingsExport;
use App\Exports\UsersExport;
use App\Exports\UserTrackingsExport;
use App\Models\Operation;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelReports extends Controller {
  //Reporte todos los usuarios
  public function usersReport(){
    return view('reports.create-users');
  }

  public function trackingsReport(){
    $states = State::all();
    $operations = Operation::all();
    return view('reports.create-trackings', compact('states', 'operations'));
  }

  public function usersTrackingReport(){
    $states = State::all();
    $operations = Operation::all();
    return view('reports.create-user-trackings', compact('states', 'operations'));
  }

  public function buildingTrackingReport(){
    $states = State::all();
    $operations = Operation::all();
    return view('reports.create-building-trackings', compact('states', 'operations'));
  }

  public function exportReportTrackings( Request $request){
    session()->put( "state_tracking", $request->state_tracking);
    session()->put( "operation_tracking", $request->operation_tracking);
    session()->put( "start_date", $request->start_date);
    session()->put( "end_date", $request->end_date);
    session()->put("active_tracking", $request->active_tracking);
    if(session('end_date')){
      $endDate = Carbon::parse(session('end_date'))->endOfDay();
      session()->put("end_date", $endDate);
    }
    session()->save();
    return Excel::download( new TrackingsExport, "trackings-".Carbon::now().".xlsx");
  }

  public function exportReportUserTrackings( Request $request){
    session()->put( "account_user", $request->account_user);
    session()->put( "state_tracking", $request->state_tracking);
    session()->put( "operation_tracking", $request->operation_tracking);
    session()->put( "start_date", $request->start_date);
    session()->put( "end_date", $request->end_date);
    session()->put("active_tracking", $request->active_tracking);
    if(session('end_date')){
      $endDate = Carbon::parse(session('end_date'))->endOfDay();
      session()->put("end_date", $endDate);
    }
    session()->save();
    return Excel::download( new UserTrackingsExport, "user-trackings".Carbon::now().".xlsx");
  }

  public function exportReportBuildingTrackings( Request $request){
    session()->put( "building_id", $request->building_id);
    session()->put( "state_tracking", $request->state_tracking);
    session()->put( "operation_tracking", $request->operation_tracking);
    session()->put( "start_date", $request->start_date);
    session()->put( "end_date", $request->end_date);
    session()->put("active_tracking", $request->active_tracking);
    if(session('end_date')){
      $endDate = Carbon::parse(session('end_date'))->endOfDay();
      session()->put("end_date", $endDate);
    }
    session()->save();
    return Excel::download( new BuildingTrackingsExport, "building-trackings".Carbon::now().".xlsx");
  }


  public function export(Request $request){
    $asesorID = $request->all();
    session()->put( "search-asesor", $asesorID);
    session()->save();
    return Excel::download( new UsersExport, 'users.xlsx');
  }

}
