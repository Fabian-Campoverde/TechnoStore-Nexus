@extends('admin.index')


@section('header')
<div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Productos</h1>
  </div>
    
@endsection
@section('container')

<div class="py-120">
    <!-- component -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('admin.products.index')}}" class="inline-flex items-center px-4 py-2 
        bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
        text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
        active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
            {{ __('Lista de Productos') }}
            </a>
            
    </div>
<br>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="w-full  md:max-w-full mx-auto">
            <div class="p-6 border border-gray-300 sm:rounded-md">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Creación de un nuevo producto</h2>
        <form method="post" 
        @if ($product->id)
        action="{{route('admin.products.update',['product'=>$product->id])}}"
        @else
        action="{{route('admin.products.store')}}"  
        @endif
          
        
        enctype="multipart/form-data">
        @if ($product->id)
        {{method_field("PUT")}}
        @endif
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Producto</label>
                    <input type="text" value="{{old('nombre',$product->nombre)}}"
                     name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ejemplo: Cama" >
                    @error('nombre')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
                {{-- <div class="w-full ">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                    <input type="file" name="image_url" id="image_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div> --}}
                <label class="block mb-6">
                    {{-- @if ($products->id)
                    <img class="w-10 h-10 rounded-full" src="{{asset($products->image_url)}}"/>
                    @endif --}}
                    @if ($product->id)
                                <img class="w-10 h-10 rounded-full" src="{{asset($product->image_url)}}"/>
                                @endif
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                    <input name="image_url" type="file" 
                        class="
                  block
                  w-full
                  mt-1
                  focus:border-indigo-300
                  focus:ring
                  focus:ring-indigo-200
                  focus:ring-opacity-50
                " />
                @error('image_url')
                <span class=" text-sm text-red-600" role="alert">
                    <strong>{{$message}}</strong>
                @enderror
                </label>
                
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo</label>
                    <input type="text" value="{{old('codigoId',$product->codigoId)}}"
                     name="codigoId" id="codigoId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="AB0001" >
                    @error('codigoId')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Actual</label>
                    <input type="number" value="{{old('stock',$product->stock)}}"
                    name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                    @error('stock')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio Compra</label>
                    <input type="text" value="{{old('precio_compra',$product->precio_compra)}}"
                    name="precio_compra" id="precio_compra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="S/. 2999" >
                    @error('precio_compra')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio Venta</label>
                    <input type="text" value="{{old('precio_venta',$product->precio_venta)}}" name="precio_venta" id="precio_venta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="S/. 2999" >
                    @error('precio_venta')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Selecciona categoria</option>
                        @foreach ($categories as $c)
                        <option value="{{$c->id}}"
                            @if (old('category_id',$product->category_id) == $c->id) selected @endif>{{$c->nombre}}</option>
                        @endforeach
                      
                    </select>
                    @error('category_id')
                <span class=" text-sm text-red-600" role="alert">
                    <strong>{{$message}}</strong>
                @enderror
                </div>
                
                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medida</label>
                    <select name="measure_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Selecciona medida</option>
                        @foreach ($measures as $m)
                        <option value="{{$m->id}}"
                            @if (old('measure_id',$product->measure_id) ==$m->id)
                                selected
                            @endif>{{$m->nombre}}</option>
                        @endforeach
                        
                        
                    </select>
                    @error('measure_id')
                <span class=" text-sm text-red-600" role="alert">
                    <strong>{{$message}}</strong>
                @enderror
                </div>
                
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock de alerta </label>
                    <input type="number" value="{{old('stock_minimo',$product->stock_minimo)}}" name="stock_minimo" id="stock_minimo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                    @error('stock_minimo')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea placeholder="Detalles del producto" name="descripcion" id="descripcion" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    >{{$product->descripcion}}</textarea>
                    @error('descripcion')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Guardar
            </button>
        </form>
    </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection