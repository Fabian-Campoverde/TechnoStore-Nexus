@extends('admin.index-datatable')


@section('header-new')
<div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Productos</h1>
  </div>
  
@endsection
@section('css-new')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
@section('container-new')

<div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="productId"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="flex flex-col items-center pb-10" id="detalles"></div>
                    <dl>
                        <dt class="mb-2 font-bold leading-none text-gray-900 dark:text-white">Precio de compra</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="compra"></dd>
                        <dt class="mb-2 font-bold leading-none text-gray-900 dark:text-white">Precio de venta</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="venta"></dd>
                        <dt class="mb-2 font-bold leading-none text-gray-900 dark:text-white">Categoría</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="productCategory">Electronics/PC</dd>
                    </dl>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="d-none d-sm-block">Cancelar</span>
                              </button>
                </div>
            </div>
        </div>
    </div>


    <div  >
  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 1px">
        
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
    </div>
    @endif 


    
    {{-- <div class="bg-white overflow-hidden sm:rounded-lg " >
        <div class="overflow-x-auto ">
            
                
                  <!-- Start coding here -->
                  <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                      <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                              </div>
                              <input wire:model="searchTerm" wire:keydown.debounce.500ms="search" type="search"  class="block w-full p-200 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                            </div>
                          </form>
                      </div>
                      <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <a type="button" href="{{route('admin.products.create')}}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                              
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Agregar Producto
                          </a>
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                          <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Export
                        </button>
                          
                          <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                          </button>
                          
                          <!-- Dropdown menu -->
                          
                          <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                Categorias
                            </h6>
                            <form wire:submit.prevent="filterCategories">
                              <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                  @foreach ($categoriesWithCount as $item)
                                      <li class="flex items-center">
                                          <input wire:model.defer="selectedCategories" wire:change="filterCategories" id="{{$item->nombre}}" type="checkbox" value="{{$item->id}}"
                                                 class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                          <label for="{{$item->nombre}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                              {{$item->nombre}} ({{$item->productCount}})
                                          </label>
                                      </li>
                                  @endforeach
                              </ul>
                          </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
    </div> --}}
        
                
            
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		


        <!--Card-->
        <div  class="p-8 mt-6 lg:mt-0 rounded-lg shadow-lg bg-white">
            <div class="overflow-x-auto">
    <table class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;" id="table">
        <thead class="text-xs text-dark-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
             
                <th data-priority="1" scope="col" class="px-6 py-3 text-center">
                    #
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Codigo
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Marca
                </th>
                
                {{-- <th scope="col" class="px-6 py-3 text-center">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Stock de Alerta
              </th>--}}
              <th scope="col" class="px-6 py-3 text-center">
                Precio de Compra
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Precio de Venta
            </th> 
              <th scope="col" class="px-6 py-3 text-center">
                Estado
            </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-blue-900 text-sm font-dark">
            @foreach ($products as $product)
              @php
                    if ($product->stock>$product->stock_minimo ) {
                        $color= "";
                    }
                    else{
                        $color= "background: rgb(242, 215, 213); color: rgb(0, 0, 0);";
                    }
                @endphp
            <tr class=" border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" style="{{$color}}">
    
               
                <th scope="row" class="px-6 text-center py-4  font-medium  whitespace-nowrap dark:text-white">
                    {{$product->id}}
               </th>                
                <th scope="row" class="px-6 text-center py-4  font-medium  whitespace-nowrap dark:text-white">
                     {{$product->codigoId}}
                </th>
                <th scope="row" class="flex items-center justify-center px-6 py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">
                        
                  <div class="mr-2">
                    <img class="w-10 h-10 rounded-pill zoom" src="{{asset($product->image_url)}}" 
                    />
                </div>
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{$product->nombre}} </div>
                        
                    </div> 
                    
                </th>
                <td class="px-6 py-4 text-center">
                    <span class="text-blue-600 font-semibold">{{$product->category->nombre}}  </span>
                       
                    
                </td>
                <td class="px-6 py-4 text-center">
                    @if ($product->brand) 
                {{ $product->brand->nombre }}
                    @endif
                </td>
                
                {{-- <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center">
                        <div class="inline-block w-4 h-4 mr-2 bg-{{$color}}-700 rounded-full"></div>
                        {{$product->stock}}
                    </div>
                </td>
               
                <td class="px-6 py-4 text-center">
                    {{$product->stock_minimo}}
                </td>--}}
                <td class="px-6 py-4 text-center">
                    S/. {{$product->precio_compra}}
                </td>
                <td class="px-6 py-4 text-center">
                    S/. {{$product->precio_venta}}
                </td> 
                
                <td class="px-6 py-4 text-center">
                    @if ($product->estado==="A")
                        <span class="text-green-600 font-semibold">Activo</span>
                    @else
                        <span class="text-red-600 font-semibold">Inactivo</span>
                    @endif
                </td>

                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        @if ($product->estado==='A')
                        <button class="inline-flex items-center desactivar" 
                        data-product-id="{{ $product->id }}"
                    id="deactivateProductButton" title="Desactivar producto">
                        <svg class="w-3 h-3 text-red-500 dark:text-white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                    </button>  
    @else
    <button class="inline-flex items-center activar" 
                        data-product-id="{{ $product->id }}"
                    id="activateProductButton" title="Activar producto">
                        <svg class="w-3 h-3 text-green-500 dark:text-white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                          </svg>
                    </button>  
    @endif
                        
                    </div>

                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" >
                        <button class="inline-flex items-center readProductButton" id="readProductButton" 
                        data-toggle="modal" data-target="#addModal"
                             data-product-id="{{$product->id}}" data-product-name="{{$product->nombre}}"
                             data-product-codigo="{{$product->codigoId}}" data-product-category="{{$product->category->nombre}}"
                             @if ($product->brand) 
                             data-product-brand="{{ $product->brand->nombre }}"
                    @endif
                              data-product-image="{{ asset($product->image_url) }}"
                             data-product-precio_compra="{{$product->precio_compra}}" data-product-precio_venta="{{$product->precio_venta}}" >
                        <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <a href="{{ route('admin.products.edit', ['product'=>$product->id]) }}" > 
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                      </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <form class="form-delete" method="POST" action="{{ route('admin.products.destroy', ['product'=>$product->id]) }}" x-data>
                              @csrf
                              {{ method_field("DELETE")}}
                              <input type="hidden" name="product_name" value="{{ $product->nombre }}">
                              <button type="submit" class="inline-flex items-center">
                                       <svg class="w-5 h-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                              </button>
                          </form>
                          

                          
                      </div>
                  </div>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 
</div>

       
    </div>

</div>    
   

    


@endsection

@section('js-new')
<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({
        responsive:true,
        stateSave:true,
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    
    dom: 'PBfrtip',
    searchPanes: {
            layout: 'columns-3',
            initCollapsed: true,
            
        },
        
        columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [3,4,7]
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [8]
            }
        ],
    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Mostrar Todo"] ],
    buttons: [
        {
            text: '{{ __('Agregar producto') }}',
            className: 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md addProduct',
            action: function () {
                window.location.href = '{{ route('admin.products.create') }}';
            }
        },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title:'Listado de Productos',
                titleAttr: 'Excel',
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title:'Listado de Productos',
                titleAttr: 'PDF',
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title:'Listado de Productos',
                titleAttr: 'Imprimir',
                exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            },
            'pageLength',
            'colvis'
        ],
        
    });
  
                $('#table tbody').on('click', '.readProductButton', function() {
                    
            const productId = $(this).data('product-id');
            const productName = $(this).data('product-name');
            const productCodigo = $(this).data('product-codigo');
            const productCategory = $(this).data('product-category');
            const productBrand = $(this).data('product-brand');
            const productImage = $(this).data('product-image');
            const productCompra = $(this).data('product-precio_compra');
            const productVenta = $(this).data('product-precio_venta');
            
            
            $('#productId').text('Producto N° '+productId+ ' | Codigo: '+productCodigo);
            $('#compra').text('S/. '+productCompra);
            $('#venta').text('S/. '+ productVenta);
            $('#productCategory').text(productCategory);
            const detailsHTML =`<img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="${productImage}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white" >${productName}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400" >${productBrand}</span> `;
                    $('#detalles').html(detailsHTML);
                    
            $('#addModal').removeClass('hidden');
        });

           
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
        const productName = e.target.querySelector("input[name='product_name']").value;
        Swal.fire({
  title: `¿Estás seguro de que deseas eliminar el producto "${productName}"?`,
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


    $('#table tbody').on('click', '.desactivar', function() {
            const productId = $(this).data('product-id');

    $.ajax({
        url: 'admin/products/' + productId + '/status',
        type: 'PUT',
        data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                estado: 'I'
        },
        success: function(response) {
           
            console.log('Desactivar el producto:', response);
            
        },
        error: function(xhr) {
            // Manejar errores si es necesario
            console.error('Error al desactivar el producto:', xhr);
        }
    });
    location.reload();
});

$('#table tbody').on('click', '.activar', function() {
            const productId = $(this).data('product-id');

    $.ajax({
        url: 'admin/products/' + productId + '/status',
        type: 'PUT',
        data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                estado: 'A'
        },
        success: function(response) {
            console.log('Activar el producto:', response);
            location.reload();
          
        },
        error: function(xhr) {
            // Manejar errores si es necesario
            console.error('Error al activar el producto:', xhr);
        }
    });
});
}); 
</script>


@endsection
