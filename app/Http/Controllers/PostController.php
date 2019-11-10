<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
 public function __construct()
    {
        $this->middleware('auth');
    }
    public function postform()
    {
    	# code...
       $allCat = Category::all();
    	return view('postformview',compact('allCat'));
    }

    public function poststore(Request $request)
    {
    	# code...
    	$validatedData = $request->validate([
        'title' => 'required|max:250',
        'details' => 'required|max:450',
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1000',
        
        ]);
         $post=new Post;
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->category_id;
        $post->title=$request->title;
        $post->details=$request->details;
        $post->title=$request->title;

        $image = $request->file('image');

        if($image){
            $uni_image_name=uniqid();
            $extention= $image->getClientOriginalExtension();
            $image_fullname = $uni_image_name.'.'.$extention;

            $path = "public/front/img/"; 
            $image_url=$path.$image_fullname;
            $imagemove=$image->move($path,$image_fullname);

             $post->image=$image_url;
            
             $post->save();

                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

              
        }
        else{
               $post->save();

                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

                
        }

       return Redirect()->route('allpost')->with($notification);

       
      

    }

    public function allpostretrive()
    {
    	# code...

    	$allpost =  Post::all();

    	return view('allpostview',compact('allpost'));
    }

    public function postedit($id)
    {
    	# code...
    	
    	 $psedit = Post::findorfail($id);
         $allCat = Category::all();

     
    	return View('posteditview',compact('psedit','allCat'));
    }

    public function updatepost(Request $request,$id)
    {
    	# code...
    	
    	 $validatedData = $request->validate([
        'title' => 'required|max:250',
        'details' => 'required|max:450',
        'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1000',
        
        ]);
        $post =Post::findorfail($id);
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->category_id;
        $post->title=$request->title;
        $post->details=$request->details;
        $post->title=$request->title;

        $image = $request->file('image');

        if($image){
            $uni_image_name=uniqid();
            $extention= $image->getClientOriginalExtension();
            $image_fullname = $uni_image_name.'.'.$extention;

            $path = "public/front/img/"; 
            $image_url=$path.$image_fullname;
            $imagemove=$image->move($path,$image_fullname);

             $post->image=$image_url;
            
             $post->save();

                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

              
        }
        else{

               $post->save();

                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

                
        }

       return Redirect()->route('allpost')->with($notification);

    }

    public function deletepost($id)
    {

    	# code...
    	$deletepost = Post::findorfail($id);

    	$deletepost->delete();
    	 $notification = array(
                    'message' => 'User info Delete Successfully !',
                    'info-type' => 'success'
                );
        return Redirect()->back()->with($notification);
    }

    public function yourallpost()
    {
    	# code...

    	$id=Auth::user()->id;

    	$data = Post::where('user_id',$id)->get();

    	return View('authpost',compact('data'));

    }

    public function singlepost($id)
    {
        # code...

        $singledata = Post::findorfail($id);

        return View('singleview',compact('singledata'));

    }
}
