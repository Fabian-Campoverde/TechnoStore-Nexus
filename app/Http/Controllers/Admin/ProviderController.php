<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::paginate(5);
        return view("admin.proveedores.index", compact("providers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers= new Provider();
        return view("admin.proveedores.create", compact("providers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProviderRequest $request)
    {
        $data= $request->all();
         Provider::create($data);
         return redirect()->route("admin.providers.index")->with(
            [
                "message"=> "Proveedor creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
         );
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        return view("admin.proveedores.create", ["providers"=> $provider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $data= $request->all();
        $provider->fill($data);
        $provider->save();
        return redirect()->route("admin.providers.index")->with(
            [
                "message"=> "Proveedor actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        try {
            $provider->delete();
            $result= [
                "message"=> "Proveedor eliminado con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Proveedor no puede ser eliminado por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.providers.index")->with($result);
    }

    
}
