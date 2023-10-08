<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;

class productsController extends Controller
{   
    function products(){
      
        $products=products::latest()->paginate(3);
        return view("products",compact("products"));
    }

    function get_product_details($id){
      
        $productID=products::find($id);
        return view("product_details",["productID"=>$productID]);
    }

    function form_input(){
       $cats=category::all();
        return view("formInput",["categories"=>$cats]);
    }
  
    function store(){

        \request()->validate([
            'name' => 'required|min:3',
            'image' => 'required|unique:products',
        ],[
            "name.required"=>"The name Is Required",
            "name.min"=>"The name At Least 3 Char",

            "image.required"=>"The Image Source Is Required",
            "image.unique"=>"The Image Source Used Before",

        ]);

        $name=\request()->get("name");
        $price=\request()->get("price");
        $image=\request()->get("image");
        $description=\request()->get("description");
        $category_id=\request()->get("category_id");
 
        $product=new products();
        $product->name=$name;
        $product->price=$price;
        $product->image=$image;
        $product->description=$description;
        $product->category_id=$category_id;
        $product->save();

        return to_route("product.show",$product->id);

    }

    function form_update($id){

        $products=products::findorfail($id);
        // $updateIdCat=category::findorfail($id);
        $cats=category::all();
        // $cats=category::all();
        // return view("formInput",["updateId"=>$products]);
        return view("formInput",["updateId"=>$products,"categories"=>$cats]);
        // return view("formInput",["updateId"=>$products,"categories"=>$cats,"updateIdCat"=>$updateIdCat]);
    }

    function edit(){

        $id=\request()->get("id");
        $productID=products::where("id",$id)->first();
        $name=\request()->get("name");
        $image=\request()->get("image");
        $price=\request()->get("price");
        $description=\request()->get("description");
        $category_id=\request()->get("category_id");

        
        
        $productID->name=$name;
        $productID->price=$price;
        $productID->image=$image;
        $productID->description=$description;
        $productID->category_id=$category_id;
        $productID->save();
        
        return to_route("product.show",$productID->id);
    }

    function destroy($id){

        $products=products::findorfail($id);
        $products->delete();
        return to_route("product.index");
    }

    function aboutPage()
    {
        return view('about');
    }

    function contactPage()
    {
        return view('contact');
    }
    
    function landingPage()
    {
        return view('landing');
    }
}
