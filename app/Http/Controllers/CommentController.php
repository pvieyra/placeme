<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Matrix\Exception;

class CommentController extends Controller {
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
        'files' => 'max:10000'
      ]);

      try {
        $comment = Comment::create([
          'tracking_id' => $request['tracking_id'],
          'state_id' => $request['state_id'],
          'subject' => $request['subject'],
          'comments' => $request['comment'],
          'tracking_date' => Carbon::now(),
        ]);
        if($request->hasFile('files')){
          $files = $request->file('files');
          foreach ($files as $file ){
            if( Storage::putFileAs('/public/comments/'. $comment->id.'/', $file , $file->getClientOriginalName())){
              File::create([
                'file' => $file->getClientOriginalName(),
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
