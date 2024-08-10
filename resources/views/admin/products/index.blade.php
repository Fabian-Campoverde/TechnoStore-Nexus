@extends('admin.index-datatable')


@section('header-new')
<div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Productos</h1>
  </div>
  
@endsection
@section('css-new')

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
                    <button type="button" data-dismiss="modal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">                    
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div  >
  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 1px">
        
        {{-- @if (session('status'))
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
    @endif  --}}

        
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
                Pcompra / Pventa
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Proveedor
            </th> 
              <th scope="col" class="px-6 py-3 text-center">
                Estado
            </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($products as $product)
              @php
                    if ($product->stock>$product->stock_minimo ) {
                        $color= "";
                    }
                    else{
                        $color= "background: rgb(242, 215, 213); color: rgb(0, 0, 0);";
                    }
                @endphp
            <tr class=" border-b border-gray-200  hover:bg-gray-50" style="{{$color}}">
    
               
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
                    S/. {{$product->precio_compra}} / S/. {{$product->precio_venta}}
                </td>
                <td class="px-6 py-4 text-center">
                    @if ($product->provider) 
                {{ $product->provider->nombre }}
                    @endif
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
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@if (session('status'))
            <script>
                
                Toastify({
            text: '{{ session('message') }}', // Mensaje del toast desde la sesión
            duration: 1500, // Duración del toast en milisegundos (en este caso, 1.5 segundos)
            close: false, // Mostrar botón de cierre
            gravity: 'top', // Posición del toast 
            position: 'right', // Alineación del toast 
            offset: {
    x: 10, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
    y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
  },
            backgroundColor: '#{{ session('color') }}', // Color de fondo del toast
        }).showToast();
            </script>
        @endif
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
    
    dom: 'Bfrtip',
    
    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Mostrar Todo"] ],
    buttons: [
        {
            text: '{{ __('Nuevo producto') }}',
            className: 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg addProduct',
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
