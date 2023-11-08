@extends('admin.index')


@section('header')
<div class="bg-emerald-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Proveedores</h1>
  </div>
    
@endsection
@section('container')

<div class="py-120">
<!-- component -->
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <a href="{{route('admin.providers.create')}}" class="inline-flex items-center px-4 py-2 
    bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
        {{ __('Agregar nuevo proveedor') }}
        </a>
        
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
    <div class="bg-white overflow-hidden sm:rounded-lg">

        <div class="overflow-x-auto">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2  ">
                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                RUC
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Razon Social
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-center">
                                Nombre comercial
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Telefono
                            </th> --}}
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
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2  ">
                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                        
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                {{$p->id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                {{$p->ruc}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{$p->nombre}}
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
                                    <a href="{{route('admin.providers.edit', ['provider'=>$p->id])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
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
                {{$providers->links()}}
            </div>
            

        </div>
    </div>
    
    </div>
    
   
    
@endsection

@section('js')
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


    
   
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

@endsection