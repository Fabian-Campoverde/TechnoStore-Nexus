@extends('layouts.page')
@section('css')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <style>
        /* Estilo específico para las listas dentro del id #product-description */
        #product-description ul {
            list-style-type: disc;
            /* Puntos para las listas no ordenadas */

        }

        #product-description ol {
            list-style-type: decimal;
            /* Números para las listas ordenadas */

        }
    </style>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto ">
                    <img class="w-full dark:hidden object-contain rounded-t-lg" src="{{ asset($product->image_url) }}"
                        alt="" />
                    {{-- <img class="w-full hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" /> --}}
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-center text-gray-900 sm:text-2xl dark:text-white">
                        {{-- Apple iMac 24" All-In-One Computer, Apple M1, 8GB RAM, 256GB SSD,
            Mac OS, Pink --}}
                        {{ $product->nombre }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-lg font-extrabold text-gray-900 sm:text-xl dark:text-white">
                            Precio: S/ {{ $product->precio_venta }}
                        </p>


                    </div>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-lg font-extrabold text-gray-900 sm:text-xl dark:text-white">
                            @if ($product->stock > 10)
                                <span class="text-green-500">Stock disponible >10 unidades</span>
                            @else
                                <span class="text-red-500">Stock limitado :
                                    @if ($product->stock == 1)
                                        1 unidad
                                    @else
                                        {{ $product->stock }} unidades
                                    @endif
                                </span>
                            @endif
                        </p>

                    </div>
                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">

                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button"
                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" value="1" id="quantity-input"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1" required />
                            <button type="button" id="increment-button"
                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>



                        <a style="cursor: pointer;" id="add-to-cart-button" data-product-id="{{ $product->id }}"
                            title=""
                            class="text-white mt-4 sm:mt-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                            role="button">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>

                            Añadir al carrito
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
                    <div id="product-description">
                        <p class="mb-6 text-gray-500 dark:text-gray-400 ">

                            {!! $product->descripcion !!}
                        </p>
                    </div>


                    {{-- <p class="text-gray-500 dark:text-gray-400">
            Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
            Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
            Magic Keyboard or Magic Keyboard with Touch ID.
          </p> --}}
                </div>
            </div>
        </div>
    </section>
@endsection



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decrementButton = document.getElementById('decrement-button');
            const incrementButton = document.getElementById('increment-button');
            const quantityInput = document.getElementById('quantity-input');

            // Definir valores mínimo y máximo
            const min = 1; // Reemplaza con el valor mínimo deseado
            const max = {{ $product->stock }}; // Reemplaza con el valor máximo deseado

            let intervalId;

            function updateQuantity(value) {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue)) {
                    quantityInput.value = Math.max(min, Math.min(max, currentValue + value));
                }
            }

            // Incrementar
            incrementButton.addEventListener('mousedown', function() {
                intervalId = setInterval(function() {
                    updateQuantity(1);
                }, 100);
            });

            incrementButton.addEventListener('mouseup', function() {
                clearInterval(intervalId);
            });

            incrementButton.addEventListener('mouseleave', function() {
                clearInterval(intervalId);
            });

            // Decrementar
            decrementButton.addEventListener('mousedown', function() {
                intervalId = setInterval(function() {
                    updateQuantity(-1);
                }, 100);
            });

            decrementButton.addEventListener('mouseup', function() {
                clearInterval(intervalId);
            });

            decrementButton.addEventListener('mouseleave', function() {
                clearInterval(intervalId);
            });

            // Actualizar el valor cuando se hace clic en el botón de decremento
            decrementButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue > min) {
                    quantityInput.value = Math.max(currentValue - 1, min);
                }
            });

            // Actualizar el valor cuando se hace clic en el botón de incremento
            incrementButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue < max) {
                    quantityInput.value = Math.min(currentValue + 1, max);
                }
            });

            // Asegurarse de que el valor ingresado esté dentro del rango
            quantityInput.addEventListener('input', function() {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue)) {
                    if (currentValue < min) {
                        quantityInput.value = min;
                    } else if (currentValue > max) {
                        quantityInput.value = max;
                    }
                }
            });

            // Manejar el campo de entrada cuando pierde el foco
            quantityInput.addEventListener('blur', function() {
                let currentValue = parseInt(quantityInput.value);
                if (isNaN(currentValue) || currentValue < min) {
                    quantityInput.value = min;
                } else if (currentValue > max) {
                    quantityInput.value = max;
                }
            });
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {

            // Manejar el clic en el botón "Añadir al carrito"
            $('#add-to-cart-button').click(function(e) {
                e.preventDefault();

                // Obtener el ID del producto y la cantidad
                var productId = $(this).data('product-id');
                var quantity = $('#quantity-input').val();

                // Enviar los datos al servidor usando AJAX
                $.ajax({
                    url: '/cart/add', // La ruta a tu endpoint para añadir al carrito
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Token CSRF
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        // Actualizar el contenido del modal con los nuevos datos del carrito
                        console.log('Correcto')
                        alert('Producto agregado exitosamente');
                        location.reload();
                        // $('#cartModal').removeClass('hidden');
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON?.message ||
                            'Error al añadir al carrito';
                        alert(errorMessage);
                    }
                });
            });







        });
    </script>
@endsection
