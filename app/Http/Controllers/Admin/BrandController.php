<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands= Brand::all();
        return view("admin.marcas.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();
        Brand::create($data);
        return redirect()->route("admin.brands.index")->with(
            [
                "message"=> "Marca creada con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $data= $request->all();
        $brand->fill($data);
        $brand->save();
        return redirect()->route('admin.brands.index')->with(
            [
                "message"=> "Marca actualizada con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            $result= [
                "message"=> "Marca eliminada con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Marca no puede ser eliminada por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        return redirect()->route("admin.brands.index")->with($result);
    }

    public function status(Request $request,Brand $brand)
{
    $brand->estado = $request->estado;
    $brand->save();
    return response()->json(['message' => 'Marca modificada exitosamente']);
}
}
