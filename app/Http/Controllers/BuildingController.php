<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('trackings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Building $building){
        return view("buildings.show",compact("building"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building){
        //
    }

    public function selectBuildings(Request $request){
      $search = $request->search;
      if($search == ""){
        $buildings = Building::orderBy('id','desc')
          ->select('id','building_code','address','suburb')
          ->where('active','=',1)
          ->limit(10)
          ->get();
      } else {
        $buildings = Building::select('id','building_code','address','suburb')
          ->where('active','=',1)
          ->where('address', 'like', '%'.$search.'%')
          ->Orwhere('building_code', 'like', '%'.$search.'%')
          ->where('active','=',1)
          ->Orwhere('suburb', 'like', '%'.$search.'%')
          ->where('active','=',1)
          ->limit(10)
          ->orderBy('id','desc')
          ->get();
      }
      $response = array();
      foreach ($buildings as $building){
        $response[] = array(
          'id' => $building->id,
          'building_code' => $building->building_code,
          'address' => $building->address,
          'suburb' => $building->suburb,
        );
      }
      return response()->json($response);
    }

    public function selectBuildingsReports(Request $request){
      $search = $request->search;
      if($search == ""){
        $buildings = Building::orderBy('id','desc')
          ->select('id','building_code','address','suburb')
          ->limit(10)
          ->get();
      } else {
        $buildings = Building::select('id','building_code','address','suburb')
          ->where('address', 'like', '%'.$search.'%')
          ->Orwhere('building_code', 'like', '%'.$search.'%')
          ->Orwhere('suburb', 'like', '%'.$search.'%')
          ->limit(10)
          ->orderBy('id','desc')
          ->get();
      }
      $response = array();
      foreach ($buildings as $building){
        $response[] = array(
          'id' => $building->id,
          'building_code' => $building->building_code,
          'address' => $building->address,
          'suburb' => $building->suburb,
        );
      }
      return response()->json($response);
    }
}
