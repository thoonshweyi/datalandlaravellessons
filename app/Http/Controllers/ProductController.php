<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "I am index page";

        $products = Product::all();
        return view("products.index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
            // $this = $request
            $this->validate($request,[
                'name' => "required|unique:products,name",
                'price' => "required|numberic",
                'image' => "required|image|mimes:jpeg,png,jpg,gif,svg,ico|max:3072"
            
                // 'title' => 'required|unique:articles,title|max:100',
                // 'status' => "required|in:active,inactive",
                // 'public_at' => 'nullable|date'
            ]);
        
        //= Public
            $product = new Product();
            $product->name= $request["name"];
            $product->price= $request["price"];

            $file = $request->file("image");
            // if($file){
                
            //     $filename = $file->getClientOriginalName();  // user1.jpg
            //     // $imagenewname = date("ymdHis").$filename;    // 231008182139user1.jpg
            //     $imagenewname = time().$filename;               // 1696764194user1.jpg
            //     $imagenewname = uniqid().$filename;               // 6571b7a01728fuser1.jpg

            //     // dd($filename);
            //     // dd($imagenewname); 

            //     $file->move("images",$imagenewname);

            //     $product->image = $imagenewname;
            // }
            // $product->save();
            // return redirect(route("products.index"));
            // *public > images

            // if($file){
                
            //     $fname = $file->getClientOriginalName(); 
            //     $imagenewname = time().$fname;               // 1696764194user1.jpg

            //     // $fileurl = $file->move("images",$imagenewname);         // 	images\1701952618user1.jpg
            //     $fileurl = $file->move(public_path('images'),$imagenewname); // // 	D:\datalandcourses\datalandlaravelbatch1\lesson\exerciseone\public\images\1701952901user1.jpg

            //     $product->image = $fileurl; 
            // }

            // $product->save();
            // return redirect(route("products.index"));
            // It store image file on the server public > images. But some os need to grant permession for read write file.
            // *sub folder can be created public_path('images/profile')
        
        // => Storage
                // if($request->hasfile('image')){
                //     $fnameext = $file->getClientOriginalExtension(); // jpg
                //     $imagenewname = uniqid().".".$fnameext; // 6571c12348c38.jpg
                //     // dd($fnameext);
                //     // dd($imagenewname);

                //     $file->storeAs("images",$imagenewname);
                //     $product->image = $imagenewname;
                // }
                // $product->save();
                // return redirect(route("products.index"));
                // *storage > app > images

                // if($request->hasfile('image')){
                //     $fnameext = $file->extension(); // jpg
                //     $imagenewname = time().".".$fnameext; // 1696766671.jpg
                //     // dd($fnameext);
                //     // dd($imagenewname);

                //     $file->storeAs("public/images",$imagenewname); // public/images/1696766671.jpg
                //     $product->image = $imagenewname;
                // }
                // *storage > app > public > images
                

                // if($request->hasfile('image')){
                //     $fnameext = $file->extension(); // jpg
                //     $imagenewname = time().".".$fnameext; // 1696766671.jpg
                //     // dd($fnameext);
                //     // dd($imagenewname);

                //     $fileurl = $file->storeAs("public/images",$imagenewname); // public/images/1696766671.jpg
                //     $product->image = $fileurl;
                // }
                // ------------------------------

                // if($request->hasfile('image')){
                //     // $fileurl = $file->store(); // xrWRknkrsZOHwIXS47gzkkBhXBvig4X4UJPSrcM4.jpg
                //     // * storage > app
                //     $fileurl = $file->store("images"); // images/yfdw2PKhja6nDUHI0OlcDn8R4ND4Bfq8515vfOAE.jpg
                //     // *storage > app > images >
                    
                //     $product->image = $fileurl;
                // }
                // ------------------------------
                // if($request->hasfile("image")){
                //     $fnameext = $file->extension(); // jpg
                //     $imagenewname = uniqid().".".$fnameext;

                //     // dd($file); // File Object
                //     // dd($file->get()); // encodeded (binary like) code
                //     // dd(file_get_contents($file)); // encodeded (binary like) code

                //     // Storage::disk("local")->put("text.txt",'hello world',optional)
                    
                //     // Storage::disk("local")->put("images/".$imagenewname,$file->get());
                    
                //     // *error (image loading)
                //     // *file reading is important
                //     // Storage::disk("local")->put("images/".$imagenewname,"hello world");

                //     $product->image = $imagenewname;
                // }
                // * storage > app > images

                if($request->hasfile("image")){
                    $fnameext = $file->extension(); // jpg
                    $imagenewname = uniqid().".".$fnameext;
                    
                    
                    // $fileurl = Storage::disk("local")->put("images/".$imagenewname,file_get_contents($file),"public"); // 1                    
                    Storage::disk("local")->put("images/".$imagenewname,file_get_contents($file),"public"); // 1                    
                    $fileurl = "public/app/images/".$imagenewname;
                    $product->image = $fileurl; // public/app/images/6572f73872526.jpg
                }
                // * storage > app > images

                $product->save();
                return redirect(route("products.index"));
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view("products.show",["product"=>$product]);
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("products.edit")->with("product",$product);
    }

    public function update(Request $request, string $id)
    {
        
        $product = Product::findOrFail($id);
        $product->name= $request["name"];
        $product->price= $request["price"];

            //=> Public
            // delete old file and updaten new file (For Public)
            // if($request->hasfile('image')){
            //     $path = public_path("images/").$product->image;
            //     if(File::exists($path)){
            //         File::delete($path);
            //     }
            // }

            // delete old file and updaten new file (For any kind of Storage)
            if($request->hasfile('image')){
                $path = storage_path("app/public/images/").$product->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }

            // if($request->hasfile('image')){

            //     $file = $request->file("image");
                
            //     $filename = $file->getClientOriginalName();  // user1.jpg
            //     $imagenewname = uniqid().$filename;               // 6571b7a01728fuser1.jpg

            //     $file->move(public_path("images"),$imagenewname);

            //     $product->image = $imagenewname;
            // }
            // $product->save();
            // return redirect(route("products.index"));
            // =update product by providing image file and without providing image file
            // *condition check if image file exist it will update the image file
            //  if image file is not exist, it will skip update process
        // => Storage
                // if($request->hasfile('image')){
                //     $file = $request->file("image");
                //     $fnameext = $file->getClientOriginalExtension(); // jpg
                //     $imagenewname = uniqid().".".$fnameext; // 6571c12348c38.jpg

                //     $file->storeAs("public/images",$imagenewname);
                //     $product->image = $imagenewname;
                // }
                // $product->save();
                // return redirect(route("products.index"));

                // if($request->hasfile('image')){
                //     $file = $request->file("image");
                //     $fileurl = $file->store("public/images");           
                //     // $product->image = $fileurl;
                //     $product->image = trim($fileurl,"public");
                // }
                // $product->save();
                // return redirect(route("products.index"));
                // error image (complex path), if not remove public
                // http://127.0.0.1:8000/storage/images/public/images/1702027582.jpg 
                
                // double backshash (//), but it work
                //http://127.0.0.1:8000/storage//images/b5f0cKt314MscFl9hwS77IR3GwPfbjAxIFLpZUnA.jpg
                
                // ------------------------------
                if($request->hasfile("image")){
                    $file = $request->file("image");
                    
                    $fnameext = $file->extension(); // jpg
                    $imagenewname = uniqid().".".$fnameext;

                    
                    // Storage::disk("local")->put("public/images/".$imagenewname,$file->get(),'public');
                    // Storage::disk("local")->put("public/images/".$imagenewname,file_get_content($file),'public');
                    Storage::disk("local")->put("public/images/".$imagenewname,File::get($file),'public');
                    // * use Illuminate\Support\Facades\File;
                    
                    $product->image = $imagenewname;
                }
                $product->save();
                return redirect(route("products.index"));
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route("products.index")); 
    }
}
