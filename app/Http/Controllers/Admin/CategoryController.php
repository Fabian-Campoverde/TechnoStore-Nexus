<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = new Category();
        return view("admin.categories.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data=$request->all();
        Category::create($data);
        return redirect()->route("admin.categories.index")->with(
            [
                "message"=> "Categoria creada con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //return view("admin.categories.show",compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        return view("admin.categories.create",["categories"=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data=$request->all();
        $category->fill($data);
        $category->save();
        return redirect()->route("admin.categories.index")->with(
            [
                "message"=> "Categoria actualizada con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        try {
            $category->delete();
            $result= [
                "message"=> "Categoria eliminada con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Categoria no puede ser eliminada por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.categories.index")->with($result);
    }

    

}
