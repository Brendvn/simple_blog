<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = new Post;
        $oldPost = $post->orderBy('created_at','desc')->limit(1)->get();
        $lastPost = $post->orderBy('created_at','asc')->limit(2)->get();
        $content = $post->get(['content']);
        $value = $this->getComman($content);
        return view('blogpage', ['oldPosts' => $oldPost,'lastPosts'=>$lastPost,'values'=>$value]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $newPost = new Post;
        $newPost->title = $request->title;
        $newPost->content = $request->maintext;
        $newPost->email = $request->email;

       $validateData = $request->validate([

            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $image = $request->file('image');
        if(strlen($image)>0) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);
            $newPost->image = $imagename;
        }
        $newPost->save();

        return redirect()->to('/');
    }

    /**
     * Get Comman words used
     *
     */
   public function getComman($content){
       $words = '';
       $count=0;
       $value = '';
       foreach ($content as $string){
           $words .= " ".$string->content;
       }
       $array2 = array_count_values(explode(' ', $words));
       arsort($array2);

       foreach($array2 as $x => $x_value) {
           if(strlen($x)>0){
            $value .= " ".$x;
           }
           $count++;
           if($count>4){
               break;
           }
       }
       return $value;
   }
}
