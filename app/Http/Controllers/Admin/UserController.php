<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users= new User();
        $roles= Role::all();
        return view("admin.users.create",compact("users","roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $user= User::create([
                "name"=> $request->name,
                "nickname"=> $request->nickname,
                "email"=> $request->email,
                "password"=> bcrypt($request->contra)
                
            ]);
            if ($request->has("image_url")) {
                $image_path = $request->file("image_url")->store("medias");
                $user->image_url = $image_path;
                $user->save(); // Guardar la ruta de la imagen en la base de datos
            }
           $user->roles()->sync($request->roles);
           return redirect()->route("admin.users.index")->with(
            [
                "message"=> "Usuario creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
        } catch (\Throwable $th) {
            return redirect()->route("admin.users.index")->with(
                [
                    "message"=> "Error al crear usuario (Posible error de email registrado)",
                    "status"=>"success",
                    "color"=>"red"
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
