<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        $valdiate = $this->validate($request, [
            'image_id' => ['integer', 'required'],
            'content' => ['required', 'string'],
        ]);

        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        $comment->save();

        return redirect()->route('image.detail', ['id' => $image_id])
                         ->with([
                            'message' => 'Has publicado un comentario'
                         ]);
    }

    public function delete($id){
        $user = \Auth::user();
        $comment = Comment::find($id);
        if($user &&  ($comment->user_id == $user->id || $comment->image->user_id = $user->id)){
            $comment->delete();

            return redirect()->route('image.detail', ['id' => $comment->image->id])
                         ->with([
                            'message' => 'Has borrado un comentario'
                         ]);
        }else{
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                         ->with([
                            'message' => 'El comentario no se ha eliminado'
                         ]);
        }

    }

}
