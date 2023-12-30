@extends('admin.index')


@section('header')
<div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Productos</h1>
  </div>
    
@endsection

@section('css-2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    span.selection,
 span.select2-selection,
 span.select2-selection__rendered,
 span.select2-selection__arrow {
     height: 40px !important;
     line-height: 27px !important;
     
     
     
 }
 </style>
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
                @if ($product->id)
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Actualizacion de producto: {{$product->nombre}}</h2>
                @else
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Creación de un nuevo producto</h2>
                @endif
                
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
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo</label>
                    <input type="text" value="{{old('codigoId',$product->codigoId)}}"
                     name="codigoId" id="codigoId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="AB0001" >
                    @error('codigoId')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre/Descripcion del Producto</label>
                    <input type="text" value="{{old('nombre',$product->nombre)}}"
                     name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ejemplo: Cama" >
                    @error('nombre')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
                    <select name="brand_id" id="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Selecciona marca</option>
                        @foreach ($brands as $b)
                        <option value="{{$b->id}}"
                            @if (old('brand_id',$product->brand_id) == $b->id) selected @endif>{{$b->nombre}}</option>
                        @endforeach
                      
                    </select>
                    @error('brand_id')
                <span class=" text-sm text-red-600" role="alert">
                    <strong>{{$message}}</strong>
                @enderror
                </div>
   
                <div class="sm:col-span-2">
                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label class="block mb-6">
                        
                                    {{-- @if ($product->id)
                                                <img class="w-10 h-10 rounded-full" src="{{asset($product->image_url)}}"/>
                                                @endif --}}
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                                    <input name="image_url" id="image_url" type="file"  accept="image/*" onchange="previewImage(event, '#imgPreview')" 
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
                            </div>
                        </div>
                        <div class="col text-center ">
                            <div class="form-group" style="margin-top:8px;">
                              <figure class="figure">
                                <div class="text-center" id="updimagepreview">
                                    <img id="imgPreview" src="//placehold.it/100?text=IMAGEN" class="" id="updpreview" width="90px" height="80px">
                                </div>
                                <figcaption class="figure-caption">Imagen nueva</figcaption>
                              </figure>
                            </div>
                        </div>
                        @if ($product->id)
                        <div class="col text-center ">
                            <div class="form-group" style="margin-top:8px;">
                              <figure class="figure">
                                <img src="{{asset($product->image_url)}}" height="80px" width="90px" class="">
                                <figcaption class="figure-caption">Imagen actual</figcaption>
                              </figure>
                            </div>
                        </div>
                        @endif
                        </div>
                </div>
                
                
                
                
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Actual</label>
                    <input type="number" value="{{old('stock',$product->stock)}}" min="0"
                    name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                    @error('stock')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock de alerta </label>
                    <input type="number" min="0" value="{{old('stock_minimo',$product->stock_minimo)}}" name="stock_minimo" id="stock_minimo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                    @error('stock_minimo')
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
                
                <div class="w-full">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                    <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                    <select name="measure_id" id="measure_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                
                
                
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalles del producto</label>
                    <textarea placeholder="Detalles del producto" name="descripcion" id="descripcion" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    >{{old('descripcion',$product->descripcion)}}</textarea>
                    @error('descripcion')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                
            </div>
            <br>
            <div class="text-right">
                @if ($product->id)
                <label for="btnSubmit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
                    <input id="btnSubmit" type="button" onclick="validarFormEdit()" class="hidden">
                    Actualizar
                    <i class="fas fa-edit ml-2"></i>
                </label>
                @else
                <label for="btnSubmit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
                    <input id="btnSubmit" type="button" onclick="validarForm()" class="hidden">
                    Añadir
                    <i class="fas fa-plus-circle ml-2"></i>
                </label>
                

                @endif
                <button id="submitButton" type="submit" style="display: none;"></button>
            </div>
            
        </form>
    </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
            $('#category_id').select2({
                width: '100%',
                
            });
            $('#brand_id').select2({
                width: '100%',
                
            });
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script>
     function validarForm() {
        // Obtener los valores de los campos
        const codigoId = document.getElementById('codigoId').value.trim();
        const nombre = document.getElementById('nombre').value.trim();
       
        const input = document.getElementById('image_url');
        let image_url = ''; // Declarar image_url fuera del if

    if (input.files && input.files.length > 0) {
        image_url = input.files[0];
    }
        const stock = document.getElementById('stock').value.trim();
        const precio_compra = document.getElementById('precio_compra').value.trim();
        const precio_venta = document.getElementById('precio_venta').value.trim();
        const measure_id = document.getElementById('measure_id').value.trim();
        const category_id = document.getElementById('category_id').value.trim();
        const stock_minimo = document.getElementById('stock_minimo').value.trim();
        const descripcion = document.getElementById('descripcion').value.trim();

        // Verificar si algún campo está vacío o tiene valor 0
        if (nombre === '' || codigoId === '' || image_url === '' || stock === '' || precio_compra === null|| precio_compra<0
        || precio_venta === null || precio_venta<0 || measure_id === '' || category_id === '' || stock_minimo === '' || descripcion === '' ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, completa todos los campos antes de continuar.',
            });
        } else {
            const submitButton = document.getElementById('submitButton');
                        if (submitButton) {
                            submitButton.click();
                        }
            
        }
    }
    function validarFormEdit() {
        // Obtener los valores de los campos
        const codigoId = document.getElementById('codigoId').value.trim();
        const nombre = document.getElementById('nombre').value.trim();
       
        const input = document.getElementById('image_url');
        let image_url = ''; // Declarar image_url fuera del if

    if (input.files && input.files.length > 0) {
        image_url = input.files[0];
    }
        const stock = document.getElementById('stock').value.trim();
        const precio_compra = document.getElementById('precio_compra').value.trim();
        const precio_venta = document.getElementById('precio_venta').value.trim();
        const measure_id = document.getElementById('measure_id').value.trim();
        const category_id = document.getElementById('category_id').value.trim();
        const stock_minimo = document.getElementById('stock_minimo').value.trim();
        const descripcion = document.getElementById('descripcion').value.trim();

        // Verificar si algún campo está vacío o tiene valor 0
        if (nombre === '' || codigoId === ''  || stock === '' || precio_compra === null|| precio_compra<0
        || precio_venta === null || precio_venta<0 || measure_id === '' || category_id === '' || stock_minimo === '' || descripcion === '' ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, completa todos los campos antes de continuar.',
            });
        } else {
            const submitButton = document.getElementById('submitButton');
                        if (submitButton) {
                            submitButton.click();
                        }
            
        }
    }
</script>
<script>
    function previewImage(event, querySelector){

//Recuperamos el input que desencadeno la acción
const input = event.target;

//Recuperamos la etiqueta img donde cargaremos la imagen
$imgPreview = document.querySelector(querySelector);

// Verificamos si existe una imagen seleccionada
if(!input.files.length) return

//Recuperamos el archivo subido
file = input.files[0];

//Creamos la url
objectURL = URL.createObjectURL(file);

//Modificamos el atributo src de la etiqueta img
$imgPreview.src = objectURL;
            
}
</script>
@endsection