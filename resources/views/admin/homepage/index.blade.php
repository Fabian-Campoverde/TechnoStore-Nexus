@extends('admin.index')


@section('header')
<div class="bg-rose-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Dashboard</h1>
  </div>
@endsection

@section('container')
<br>
<div class="flex space-x-4 " >
    <a href="{{ route('admin.categories.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://www.ecommercenews.pe/wp-content/uploads/2017/07/tienda-online-810x405.png" alt="">
            </div>
            <div class="p-4">
                <h5 class="text-2xl font-bold text-gray-900 dark:text-white uppercase">Categorias</h5>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.providers.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://baloriza.com/wp-content/uploads/QUE-ES-UN-PROVEEDOR.jpg" alt="">
            </div>
            <div class="p-4">
                <h5 class="text-2xl font-bold text-gray-900 dark:text-white uppercase">Proveedores</h5>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.measures.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://http2.mlstatic.com/D_NQ_NP_783586-MLA31092780948_062019-O.webp" alt="">
            </div>
            <div class="p-4 items-center">
                <h5 class="text-2xl text-center font-bold text-gray-900 dark:text-white uppercase">Medidas</h5>
                {{-- <p class="mb-3 text-center font-normal text-gray-700 dark:text-gray-400">X medidas registradas</p> --}}
            </div>
        </div>
    </a>

    
</div>
<br>
<div class="flex space-x-4">
    <a href="{{ route('admin.products.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://www.southexpress.pe/wp-content/uploads/2021/03/almacen_rajapack.jpg" alt="">
            </div>
            <div class="p-4">
                <h5 class="text-2xl font-bold text-gray-900 dark:text-white uppercase">Productos</h5>
            </div>
        </div>
    </a>

    <a href="" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://gestion.pe/resizer/2MjWeANMzzQ4M26JMUQqjp9nsaY=/580x330/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/G2XIAUGTHJAKPGDPTPU3HRMAPQ.jpg" alt="">
            </div>
            <div class="p-4">
                <h5 class="text-2xl font-bold text-gray-900 dark:text-white uppercase">Ingresos</h5>
            </div>
        </div>
    </a>

    <a href="" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://www.noegasystems.com/wp-content/uploads/fases-del-proceso-de-recepcion-de-mercancias-en-un-almacen.jpg" alt="">
            </div>
            <div class="p-4 ">
                <h5 class="text-2xl  font-bold text-gray-900 dark:text-white uppercase">Salidas</h5>
                {{-- <p class="mb-3 text-center font-normal text-gray-700 dark:text-gray-400">X medidas registradas</p> --}}
            </div>
        </div>
    </a>

    
</div>
@endsection