<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\File;
use App\Models\State;
use App\Models\Tracking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Matrix\Exception;

class CommentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Tracking $tracking, Request $request){
      //user esta en la sesion de login. Policy()
      $searchState = $request['state_id'];
      $searchStartDate = $request['start_date'];
      $searchEndDate = $request['end_date'];
      if(isset($searchEndDate)){
        $endDate = Carbon::createFromFormat('Y-m-d',$searchEndDate)->addDay();
      }
      //return $request->all();
      //$comments = $tracking->comments->sortBy('created_at');
      $states = State::all();
      $comments = Comment::select()
        ->where('tracking_id','=', $tracking->id)
        ->when($searchState, function($query) use($searchState){
          $query->where('state_id','=' , $searchState);
        })
        ->when($searchStartDate && $searchEndDate  ,function($query) use($searchStartDate, $searchEndDate){
          return $query->whereBetween('created_at', [ $searchStartDate, $searchEndDate]);
        })
        ->when(($searchStartDate && is_null($searchEndDate)) ,function($query) use($searchStartDate){
          $query->whereDate('created_at', [ $searchStartDate]);
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
      return view('comments.index', compact('comments', 'tracking','states'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
      $max_size = (int)ini_get('upload_max_filesize') * 10240;
      $data = $request->validate([
        'tracking_id' => 'required|numeric',
        'state_id' => 'required',
        'subject' => 'required',
        'comment' => 'required',
        'files.*' => 'max:5000'
      ]);

      try {
        $comment = Comment::create([
          'tracking_id' => $request['tracking_id'],
          'state_id' => $request['state_id'],
          'subject' => $request['subject'],
          'comments' => $request['comment'],
          'tracking_date' => Carbon::now(),
        ]);

        $tracking = Tracking::findOrFail($request['tracking_id']);
        $tracking->updated_at = $comment->created_at;
        $tracking->save();

        if($request->hasFile('files')){
          $files = $request->file('files');
          foreach ($files as $file ){
            $fileName = $file->getClientOriginalName();
            $filePatha = Str::slug($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $filePath = "comments/". $comment->id ."/". $filePatha;
            if( Storage::putFileAs('/public/comments/'. $comment->id.'/', $file ,$filePatha)){
              File::create([
                'file' => $fileName,
                'file_path' => $filePath,
                'comment_id' => $comment->id,
              ]);
            }
          }
        }
        return redirect()->back()->with('success','Comentario guardado');
      }catch(Exception $exception){
        return redirect()->back()->with('error',$exception->getMessage());
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
