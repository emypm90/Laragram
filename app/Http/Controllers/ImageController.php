<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Like;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        
        //Validacion
        $validate = $this->validate($request, [
            'image_path' => ['required', 'image'],
            'description' => ['required', 'string', 'max:255']
        ]);

        if (!$validate)
            return "alguno de los campos no son correctos";

        //Recoger los datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //Asignar valores al nuevo objeto
        $user = \Auth::user();
        $image = new image();
        $image->user_id = $user->id;        
        $image->description = $description;

        //Subir fichero
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('dashboard')->with([
            'message' => 'Foto subida correctamente'
        ]);             
    }

      public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id){
        $image = Image::find($id);

        return view('image.detail',[
            'image' => $image
        ]);
    }

    public function delete($id){
        $user = \Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if($user && $image->user->id == $user->id){
            if($comments && count($comments) >= 1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            } 
        

            if($likes && count($likes) >= 1){
                foreach($likes as $like){
                    $like->delete();
                }
            }

            Storage::disk('images')->delete($image->image_path);

            $image->delete();

            $message = array('message' => 'Has borrado una publicacion');
        }else{
            $message = array('message' => 'La publicacion no se ha podido eliminar');
        }

        return redirect()->route('dashboard')->with($message);
    }

    public function edit($id){
        $user = \Auth::user();
        $image = Image::find($id);

        if($user && $image && $image->user->id == $user->id){
            return view('image.edit', [
                'image' => $image
            ]);
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function update(Request $request){

        //Validacion
        $validate = $this->validate($request, [
            'image_path' => ['image'],
            'description' => ['string', 'max:255']
        ]);

        //Recoger datos
        $image_id = $request->input('image_id');
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //Conseguir objeto image
        $image = Image::find($image_id);
        $image->description = $description; 

        //Subir fichero
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        //Actualiar registro
        $image->update();


        return redirect()->route('image.detail', ['id' => $image_id])
                         ->with(['message' => 'Publicacion editada']);

    }

}
