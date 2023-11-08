<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Measure;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        $categories= Category::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $productCount = Product::where('category_id', $category->id)->count();
            $category->productCount = $productCount;
            return $category;
        });
        return view("admin.products.index", compact("products","categoriesWithCount"),);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        $measures = Measure::all();
        $product = new Product();
        return view("admin.products.create", compact("categories","measures","product"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data=$request->all();
        if($request->has("image_url")){
        $image_path=$request->file("image_url")->store("medias");
        $data["image_url"]=$image_path;
        }
        Product::create($data);
        return redirect()->route("admin.products.index")->with(
            [
                "message"=> "Producto creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories= Category::all();
        $measures = Measure::all();
        return view("admin.products.create", compact("categories","measures","product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data=$request->all();
        if($request->has("image_url")){
            Storage::delete($product->image_url);
        $image_path=$request->file("image_url")->store("medias");
        $data["image_url"]=$image_path;
        }
        $product->fill($data);
        $product->save();
        return redirect()->route("admin.products.index")->with(
            [
                "message"=> "Producto actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            $result= [
                "message"=> "Producto eliminado con exito",
                "status"=>"success",
                "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Producto no puede ser eliminado",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.products.index")->with($result);
    }
}
