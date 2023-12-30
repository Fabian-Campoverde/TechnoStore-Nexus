@extends('admin.index')

@section('title', 'Dashboard')

@section('content_header')
<div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
  <h1 class="text-2xl font-semibold text-white uppercase">Productos</h1>
</div>
    
@stop

@section('content')
@livewire('product-pagination')   
@stop

@section('css')
@livewireStyles

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css" integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@vite(['resources/css/app.css','resources/js/app.js'])


    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
@livewireScripts
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

    $(document).ready(function () {
        $('#simple-search').on('input', function () {
            var searchTerm = $(this).val().toLowerCase(); // Convertir la búsqueda a minúsculas
            var $table = $('#product-table');

            $table.find('tbody tr').hide();
            $table.find('tbody tr').each(function () {
                var text = $(this).text().toLowerCase(); // Convertir el contenido de la fila a minúsculas
                if (text.indexOf(searchTerm) !== -1) {
                    $(this).show();
                }
            });
        });
    });
    
   
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>


@yield('js')
    
@stop