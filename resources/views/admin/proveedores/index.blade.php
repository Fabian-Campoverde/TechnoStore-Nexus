@extends('admin.index-datatable')


@section('header-new')
<div class="bg-emerald-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Proveedores</h1>
  </div>
    
@endsection
@section('css-new')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
@section('container-new')

<div class="py-120">
<!-- component -->
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <button id="defaultModalButton" data-toggle="modal" data-target="#addModal"
class="inline-flex items-center px-4 py-2 
    bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4"
>{{ __('Agregar nuevo proveedor') }}</button>
        
</div>
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
style="margin-left: 40px; ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="p-4 md:p-5" method="POST" id="formAdd" action="{{ route('admin.providers.store') }}">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="razon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-user-tie mr-1 my-text-color"></i> Razon Social:</label>
                          <input type="text" name="razon_social" id="razon_social"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsico Iberia Servicios Centrales, S.L." >                    
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-address-card"></i> Nombre Comercial:</label>
                        <input type="text" name="nombre"  id="nombre" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsi" >
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-id-card mr-1 my-text-color"></i> RUC:</label>
                          <input type="text" name="ruc"  id="ruc" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10734677071 " >
                    </div>
                   
                    <div>
                        <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-phone-alt"></i> Telefono:</label>
    <div class="relative">
        
        <input type="text" name="telefono"  id="telefono" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="123456789" >
    </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-map-marker-alt mr-1 my-text-color"></i> Direccion:</label>
                        <input type="text" name="direccion"   id="direccion"  
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Av. Balta 123" >                   
                    </div>
                </div>
                <button id="submitButton" type="submit" style="display: none;"></button>
            </form>
        </div>
        <div class="modal-footer">
            
        <button  type="button" class="btn btn-danger" data-dismiss="modal">
    <span class="d-none d-sm-block">Cancelar</span>
          </button>
          <label for="btnSubmit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
            <input id="btnSubmit" type="button" onclick="validarForm()" class="hidden">
            Añadir
            <i class="fas fa-plus-circle ml-2 mr-1 my-text-color"></i>
        </label>
        
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
style="margin-left: 40px; ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
          <button type="button" id="close-edit" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="p-4 md:p-5" method="POST" id="editForm">
                {{ method_field('PUT') }}
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="razon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razon Social</label>
                          <input type="text" name="razon_social" id="razon_socialEdit"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsico Iberia Servicios Centrales, S.L." >                    
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Comercial</label>
                        <input type="text" name="nombre"  id="nombreEdit" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsi" >
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RUC</label>
                          <input type="text" name="ruc"  id="rucEdit" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10734677071 " >
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                          <input type="text" name="telefono"  id="telefonoEdit" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="950915951" >
                    </div>
                    
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
                        <input type="text" name="direccion"   id="direccionEdit"  
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Av. Balta 123" >                   
                    </div>
                </div>
                <button id="submitButtonEdit" type="submit" style="display: none;"></button>
            </form>
        </div>
        <div class="modal-footer">
            
        <button  type="button" class="btn btn-danger" data-dismiss="modal">
    <span class="d-none d-sm-block">Cancelar</span>
          </button>
          <label for="btnSubmitEdit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
            <input id="btnSubmitEdit" type="button" onclick="validarFormEdit()" class="hidden">
            Actualizar
                    <i class="fas fa-edit ml-2"></i>
        </label>
        
        </div>
      </div>
    </div>
</div> 
<!-- Main modal -->
<div id="editModal" tabindex="-1" aria-hidden="true" style="margin-top: 20px; " class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-8 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Editar Proveedor
                </h3>
                <button type="button" id="close-edit" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" id="editForm">
                {{method_field("PUT")}}
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="razon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razon Social</label>
                          <input type="text" name="razon_social" id="razon_socialEdit"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsico Iberia Servicios Centrales, S.L." >                    
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Comercial</label>
                        <input type="text" name="nombre"  id="nombreEdit" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsi" >
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RUC</label>
                          <input type="text" name="ruc"  id="rucEdit" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10734677071 " >
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                          <input type="text" name="telefono"  id="telefonoEdit" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="950915951" >
                    </div>
                    
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
                        <input type="text" name="direccion"   id="direccionEdit"  
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Av. Balta 123" >                   
                    </div>
                </div>
                <div class="text-right">
                    <label for="btnUpdate" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
                        <input id="btnUpdate" type="button" onclick="validarFormEdit()" class="hidden">
                        Actualizar
                        <i class="fas fa-sync-alt ml-2"></i>
                    </label>
                    <button id="submitButtonEdit" type="submit" style="display: none;"></button>
                </div>
                
            </form>
        </div>
    </div>
</div>
    <!-- component -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        @if (session('status'))
        <br>
        <div id="alert-1" class="flex items-center p-4 mb-4 text-{{session('color')}}-800 rounded-lg bg-{{session('color')}}-50"  role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('message') }}
            </div>
              <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-dark-50 text-dark-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target='#alert-1' aria-label='Close' >
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
          </div>
        
    @endif 
    <br>
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
       <!--Card-->
        <div  class="p-8 mt-6  lg:mt-0 rounded shadow bg-white">
                        <table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead class="text-xs text-gray-700 uppercase bg-emerald-100 ">
                        <tr>
                            
                            <th scope="col" class="px-6 py-3 text-center">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                RUC
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Razon Social
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nombre comercial
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telefono
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Direccion
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                               Creacion
                            </th>
                            <th scope="col" class="py-3 px-6 text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $p)
                            
                        
                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                            
                        
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                {{$p->id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                {{$p->ruc}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{$p->razon_social}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$p->nombre}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$p->telefono}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$p->direccion}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$p->created_at}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <button class="inline-flex items-center editar-prov" id="readProductButton"
                                                            data-prov-id="{{ $p->id }}"
                                                            data-prov-nombre="{{ $p->nombre }}" 
                                                            data-prov-razon="{{ $p->razon_social }}"  
                                                            data-prov-ruc="{{ $p->ruc }}" 
                                                            data-prov-direccion="{{ $p->direccion }}" 
                                                            data-prov-telefono="{{ $p->telefono }}"         
                                                            data-toggle="modal" data-target="#editModal">
                                                                <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </button>
                                </div>
                                
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    
                                    <form class="form-delete" action="{{route('admin.providers.destroy',['provider'=>$p->id])}}" method="post" x-data>
                                        @csrf
                                        {{method_field("DELETE")}}
                                        <input type="hidden" name="provide_name" value="{{ $p->nombre }}">
                                        <button type="submit" class="inline-flex items-center" >
                                            <svg class="w-5 h-4"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        </form>
                                    
                                    
                                </div>
                            </td>
                    



                        </tr>

                        
                        @endforeach
                    </tbody>
                </table>
                
            

        </div>
    </div>
    
    </div>
    
   
    
@endsection

@section('js-new')
<script>
    $(document).ready(function() {
    var table = $('#example').DataTable({
        responsive:true,
        stateSave:true,
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    dom: 'Bfrtip',
    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Mostrar Todo"] ],
    buttons: [
     
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title:'Listado de Proveedores',
                titleAttr: 'Excel',
                exportOptions: {
                columns: [0,1,2,3,4]
            }
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title:'Listado de Proveedores',
                titleAttr: 'PDF',
                exportOptions: {
                columns: [0,1,2,3,4]
            }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title:'Listado de Proveedores',
                titleAttr: 'Imprimir',
                
                exportOptions: {
                columns: [0,1,2,3,4]
            }
            },
            'pageLength',
            'colvis'
        ],
    });

    
        $('#example tbody').on('click', '.editar-prov', function() {
            
const provId = $(this).data('prov-id');
            const provNombre = $(this).data('prov-nombre');
            const provRazon = $(this).data('prov-razon');
            const provRuc = $(this).data('prov-ruc');
            const provDireccion = $(this).data('prov-direccion');
            const provTelefono = $(this).data('prov-telefono');

            
            // Rellenar el formulario en el modal con los datos obtenidos
            $('#id').val(provId);
            $('#nombreEdit').val(provNombre);
            $('#razon_socialEdit').val(provRazon);
            $('#rucEdit').val(provRuc);
            $('#direccionEdit').val(provDireccion);
            $('#telefonoEdit').val(provTelefono);
            

            // Establecer la acción del formulario para editar la categoría
            const editForm = $('#editForm');
            const actionUrl = "{{ route('admin.providers.update', ['provider' => ':provider']) }}";
            const updatedActionUrl = actionUrl.replace(':provider', provId);
            editForm.attr('action', updatedActionUrl);
            
            
            // Mostrar el modal
            $('#editModal').removeClass('hidden');
    });

    $('.form-delete').submit(function (e) {
        e.preventDefault();
        const providerName = e.target.querySelector("input[name='provide_name']").value;
        Swal.fire({
  title: `¿Estás seguro de que deseas eliminar el proveedor "${providerName}"?`,
  text: "No hay vuelta atrás!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, hazlo!',
  cancelButtonText:'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
    this.submit();
  }
});
    });
});
</script>
<script>
      
    // document.getElementById('closeAlert').addEventListener('click', function() {
    //     document.getElementById('alert').style.display = 'none';
    // });
    const closeButton = document.querySelector('[data-dismiss-target="#alert-1"]');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            const alert = document.getElementById('alert-1');
            if (alert) {
                alert.style.display = 'none';
            }
        });
    };
    


    
   
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/libretranslate@2.1.0/dist/libretranslate.js"></script>
<script>
     function validarForm() {
        // Obtener los valores de los campos
        const razon_social = document.getElementById('razon_social').value.trim();
        const nombre = document.getElementById('nombre').value.trim();
        const ruc = document.getElementById('ruc').value.trim();
        const telefono = document.getElementById('telefono').value.trim();
        const direccion = document.getElementById('direccion').value.trim();
        

        // Verificar si algún campo está vacío o tiene valor 0
        if (nombre === '' || razon_social === '' || direccion === '' || telefono === '' || ruc === '' ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, completa todos los campos antes de continuar.',
            });
        } else {
            $.ajax({
            type: 'POST',
            url: '/admin/providers', // Reemplaza esto con la URL de tu controlador y método
            data: {
                _token: '{{ csrf_token() }}', // Agrega el token CSRF de Laravel si es necesario
                razon_social: razon_social,
                nombre: nombre,
                ruc: ruc,
                telefono: telefono,
                direccion: direccion
            },
            success: function(response) {
                
                    const submitButton = document.getElementById('submitButton');
                        if (submitButton) {
                            submitButton.click();
                        }
                
            },
            error: function(xhr) {
                if (xhr.status === 422) {
            const response = xhr.responseJSON;
            if (response && response.errors) {
                let errorMessage = '';

                if (Array.isArray(response.errors)) {
                    errorMessage = response.errors.join('\n');
                } else if (typeof response.errors === 'object') {
                    errorMessage = Object.values(response.errors).join('\n');
                } else {
                    errorMessage = response.errors.toString();
                }

                // Manejar los errores de validación
                Swal.fire({
                    icon: 'error',
                    title: 'Error de validación',
                    text: errorMessage,
                });
            } else {
                console.error('Respuesta inválida:', response);
            }
        } else {
            console.error('Error en la petición AJAX:', xhr);
        }
    }
        });
            
        }
    }
</script>

<script>
    function validarFormEdit() {
        // Obtener los valores de los campos
        const id = document.getElementById('id').value.trim();
        const razon_social = document.getElementById('razon_socialEdit').value.trim();
        const nombre = document.getElementById('nombreEdit').value.trim();
        const ruc = document.getElementById('rucEdit').value.trim();
        const telefono = document.getElementById('telefonoEdit').value.trim();
        const direccion = document.getElementById('direccionEdit').value.trim();
        

        // Verificar si algún campo está vacío o tiene valor 0
        if (id === '' || nombre === '' || razon_social === '' || direccion === '' || telefono === '' || ruc === '' ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, completa todos los campos antes de continuar.',
            });
        } else {
            $.ajax({
            type: 'POST',
            url: '/admin/providers/'+id, 
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT', 
                razon_social: razon_social,
                nombre: nombre,
                ruc: ruc,
                telefono: telefono,
                direccion: direccion
            },
            success: function(response) {
                
                    const submitButton = document.getElementById('submitButtonEdit');
                        if (submitButton) {
                            submitButton.click();
                        }
                
            },
            error: function(xhr) {
                if (xhr.status === 422) {
            const response = xhr.responseJSON;
            if (response && response.errors) {
                let errorMessage = '';

                if (Array.isArray(response.errors)) {
                    errorMessage = response.errors.join('\n');
                } else if (typeof response.errors === 'object') {
                    errorMessage = Object.values(response.errors).join('\n');
                } else {
                    errorMessage = response.errors.toString();
                }

                // Manejar los errores de validación
                Swal.fire({
                    icon: 'error',
                    title: 'Error de validación',
                    text: errorMessage,
                });
            } else {
                console.error('Respuesta inválida:', response);
            }
        } else {
            console.error('Error en la petición AJAX:', xhr);
        }
    }
        });
            
        }
    }
</script>
@endsection