@extends('admin.index-datatable')


@section('header-new')
<div class="bg-sky-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Entrada de Productos</h1>
  </div>
@endsection
@section('container-new')
<div class="py-120">
   
        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.inputs.create') }}"
                class="inline-flex items-center px-4 py-2 
    bg-green-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                {{ __('Agregar Entrada') }}
            </a>

        </div>
<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center md:inset-8 w-full h-full"
style="margin-top: 50px;  margin-left: 80px;">
    <div class="relative p-4 max-w-4xl h-full mx-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="flex items-center justify-center w-full">
                    <div class="w-full max-w-3xl">
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                ENTRADA DE PRODUCTOS - # <span id="inputID"></span>
                            </h3>
                        </div>
                        <div class="flex justify-center items-center mt-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="cliente" class="font-semibold">Proveedor</label>
                                    <p id="inputProv" class="text-gray-700"></p>
                                </div>
                                <div>
                                    <label for="tipo" class="font-semibold">Fecha</label>
                                    <p id="inputFecha" class="text-gray-700"></p>
                                </div>
                                <div>
                                    <label for="folio" class="font-semibold">Comprobante</label>
                                    <p id="inputComprobante" class="text-gray-700"></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" id="close-read" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only close">Close modal</span>
                    </button>
                </div>
            </div>
                           
            <div class="p-4 mt-6 lg:mt-0 overflow-x-auto">
                <table style="width:100%; padding-top: 1em; padding-bottom: 1em;" id="modal" class="stripe hover w-full table-auto p-2">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">Codigo Producto</th>
                            <th scope="col" class="px-6 py-3 text-center">Producto</th>
                            <th scope="col" class="px-6 py-3 text-center">Cantidad</th>
                            <th scope="col" class="px-6 py-3 text-center">Precio</th>
                            <th scope="col" class="px-6 py-3 text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="inputDetails">                   
                        {{-- <tr>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">000000</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">Lapicero Pilot  </td>
                            <td class="px-6 py-4 text-center">3</td>
                            <td class="px-6 py-4 text-center">4</td>
                            <td class="px-6 py-4 text-center">5</td>                              
                        </tr>                                --}}
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" class="px-6 py-3 text-center">Total</th>
                            <td></td>
                            <td></td>
                            <td class="px-6 py-3"></td>
                            <td id="inputTotal" class="px-6 py-3"></td>
                        </tr>
                        </tfoot>
                </table>
            </div>
            <br>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <button type="button" class="hidden text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        Edit
                    </button>               
                    <button type="button" class="hidden py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Preview
                    </button>
                </div>              
                <button type="button" class=" hidden inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>






        
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
            <br>
        @endif 
        
        
	<!--Container-->
	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		


		<!--Card-->
		<div  class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


			<table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead class="text-xs text-white uppercase bg-blue-500 dark:text-white">
					<tr>
						<th data-priority="1" scope="col" class="px-6 py-3 text-center">ID</th>
                        <th data-priority="2" scope="col" class="px-6 py-3 text-center">Comprobante</th>
						<th data-priority="3" scope="col" class="px-6 py-3 text-center">Fecha de Emision de Compra</th>
						<th data-priority="4" scope="col" class="px-6 py-3 text-center">Proveedor</th>
						<th data-priority="5" scope="col" class="px-6 py-3 text-center">Total</th>
						{{-- <th data-priority="5" scope="col" class="px-6 py-3 text-center">Fecha de Entrada</th> --}}
						<th data-priority="6" scope="col" class="px-6 py-3 text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($inputs as $input)
                        
                    
					<tr>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">{{$input->id}}</td>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">{{$input->comprobante}}</td>
						<td class="px-6 py-4 text-center"> {{$input->fechaCompra}}</td>
						<td class="px-6 py-4 text-center">{{$input->provider->nombre}}</td>
						<td class="px-6 py-4 text-center">S/. {{$input->totalCompra}}</td>
                        {{-- <td class="px-6 py-4 text-center">{{$input->created_at}}</td> --}}
						<td class="px-6 py-4">
                            <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <button class="inline-flex items-center readProductButton" id="readProductButton" data-input-id="{{ $input->id }}" data-modal-target="readProductModal" data-modal-toggle="readProductModal">
                          <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <a href="{{ route('admin.inputs.edit', ['input'=>$input->id]) }}" > 
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            </div>
                            
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                
                                <form class="form-delete" method="POST" action="{{ route('admin.inputs.destroy', ['input'=>$input->id]) }}" x-data>
                                   @csrf
                                   {{ method_field("DELETE")}}
                                    <input type="hidden" name="input_name" value="{{ $input->id }}">
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
		<!--/Card-->


	</div>
	<!--/container-->
        </div>


       
</div>

@endsection

@section('js-new')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
</script>
<script>
   $(document).ready(function() {
    var table;
        $('.readProductButton').on('click', function() {
            
            
        });

        $('.close').on('click', function() {
            $('#readProductModal').addClass('hidden');
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
					responsive: true,
                    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    dom: 'PBfrtip',
    searchPanes: {
            layout: 'columns-2',
            initCollapsed: true
        },
        
        columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [ 2, 3]
            }
        ],
    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Mostrar Todo"] ],
        buttons: [
            
       
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title:'Listado de Compras',
                titleAttr: 'Excel',
                exportOptions: {
                columns: [1,2,3,4]
            }
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title:'Listado de Compras',
                titleAttr: 'PDF',
                exportOptions: {
                columns: [1,2,3,4]
            }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title:'Listado de Compras',
                titleAttr: 'Imprimir',
                exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                columns: [1,2,3,4]
            }
            },
            
            'colvis',
            'pageLength'
        ],
       
    
				})
				.columns.adjust()
				.responsive.recalc();
                var table2;
                const startIndex = 10;
        $('#example tbody').on('click', '.readProductButton', function() {
            const rowIndex = $('#example').DataTable().row($(this).closest('tr')).index();

        // Verificar si la fila está por encima o igual al índice de inicio
        if (rowIndex >= startIndex) {
            // Ejecutar el código para cerrar el modal
            document.querySelector("#close-read").click();
        }
        const inputId = $(this).data('input-id');
            // Destruir la tabla DataTable existente antes de volver a inicializarla
    if ($.fn.DataTable.isDataTable('#modal')) {
        $('#modal').DataTable().destroy();
    }
            $.ajax({
                url: '/admin/inputs/' + inputId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Mostrar los detalles del input en el modal
                    const input = response.input;
                    const inputDetails = response.inputDetails;
                    if (inputDetails.length > 0) {
        let detailsHTML = '';

        inputDetails.forEach(detail => {
            // Construir el HTML con los detalles de inputDetail
            detailsHTML += `
            <tr>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                            ${detail.product.codigoId}
                            </td>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                            ${detail.product.nombre}</td>
						<td class="px-6 py-4 text-center"> ${detail.cantidad}</td>
						<td class="px-6 py-4 text-center">S/. ${detail.precio}</td>
						<td class="px-6 py-4 text-center">S/. ${detail.total_producto}</td>
                        </tr>
                
            `;
        });

        // Insertar los detalles de inputDetail en el modal
        $('#inputDetails').html(detailsHTML);
    }
                    $('#inputID').text(input.id); 
                    $('#inputFecha').text(input.fechaCompra);
                    $('#inputComprobante').text(input.comprobante);
                    $('#inputTotal').text('S/. '+input.totalCompra); 
                    $('#inputProv').text(input.provider.nombre); 
                    

                // Inicializar la tabla de DataTables después de haber agregado las filas
            $('#modal').DataTable({
                responsive: true,
                    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    dom: 'Bfrtip',
    lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "Mostrar Todo"] ],
    buttons: [
      
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title: 'Listado de Detalle de Compras # '+input.id+ '<br>'
                + 'Proveedor: ' +input.provider.nombre + '<br>' 
                + 'Comprobante: ' +input.comprobante + '<br>'
               + 'Fecha de Compra: '+input.fechaCompra+ '<br>'
               + 'Total de Compra: S/. '+input.totalCompra,
                titleAttr: 'Imprimir',
                
                exportOptions: {
                columns: [0,1,2,3]
            }
            },
            'pageLength'
        ],
            })
            .columns.adjust()
            .responsive.recalc();
                table.draw();
               
                    $('#readProductModal').removeClass('hidden');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    });

                $('.form-delete').submit(function (e) {
        e.preventDefault();
        const productName = e.target.querySelector("input[name='input_name']").value;
        Swal.fire({
  title: `¿Estás seguro de que deseas eliminar la entrada # ${productName}?`,
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

@endsection
