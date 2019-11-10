<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function cateindex()
    {
    	# code...
       
       return view('cateview');

    }

    public function storecate(Request $request)
    {

    	 $validatedData = $request->validate([
        'category_name' => 'unique:categories|max:255|min:4',
       
        ]);

        $category=new Category;
        $category->category_name=$request->category_name;
       
        $category->save();
        
        if($category){
                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

                return Redirect()->back()->with($notification);
       }
        else{
                $notification = array(
                        'message' => 'Something is worng',
                        'alert-type' => 'error'
                    );

                    return Redirect()->route('cateview')->with($notification);

        }

    }

    public function allcate()
    {
    	$allCat = Category::all();

    	return view('allcateindex',compact('allCat'));

    }
}
