@extends('layouts.page')
@section('content')
    <div class="sliders bg-blue-200">
        {{-- <div class="flex justify-center">
            <a href="" class="flex items-center">
                <img src="{{ asset('logo.png') }}" class="mr-3 sm:h-30 h-40 w-auto " alt="Logo" />
            </a>
        </div> --}}

        <div class="max-w-8xl mx-auto py-4 px-0">

            <div class="overflow-hidden  sm:rounded-lg">

                <div class="w-full  md:max-w-full mx-auto">
                    <div class=" sm:rounded-md">
                        <div class=" grid-cols-4 sm:grid-cols-2 gap-4">
                            <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-24 overflow-hidden rounded-lg md:h-96">
                                    <!-- Items -->
                                    @foreach ($sliders as $slider)
                                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                                            <img src="{{ $slider->id ? asset($slider->imagen) : 'https://flowbite.com/docs/images/carousel/carousel-2.svg' }}"
                                                class="carousel-img absolute h-full block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="{{ $slider->titulo }}">
                                        </div>
                                    @endforeach

                                </div>
                                <!-- Slider indicators -->
                                <div
                                    class="absolute z-30 flex -translate-x-1/2 bottom-2 sm:bottom-2 md:bottom-2 lg:bottom-4   left-1/2 space-x-5 rtl:space-x-reverse ">
                                    @foreach ($sliders as $index => $slider)
                                        <button type="button" class="w-3 h-3 rounded-full bg-black" aria-current="true"
                                            aria-label="Slide {{ $index + 1 }}"
                                            data-carousel-slide-to="{{ $index }}"></button>
                                    @endforeach
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="categorias" id="products-section">
        <section class="bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Nuestros productos</h2>

                    <a href="#" title=""
                        class="flex items-center text-base font-medium text-primary-700 hover:underline dark:text-primary-500">
                        Ver más productos
                        <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                    @foreach ($categories as $c)
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300">
                            <a href="{{ route('category.products', ['id' => $c->id]) }}">
                                <img class="w-full h-48 object-contain rounded-t-lg" src="{{ asset($c->imagen) }}"
                                    alt="" />
                            </a>
                            <hr class="border-gray-300 dark:border-gray-700">
                            <div class="p-5">
                                <a href="{{ route('category.products', ['id' => $c->id]) }}">
                                    <h5
                                        class="uppercase mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $c->nombre }}</h5>
                                </a>
                                <a href="{{ route('category.products', ['id' => $c->id]) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ver más
                                    <svg class="w-3.5 h-3.5 ml-2 relative top-0.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        </section>

    </div>

    <div class="marcas">
        <section class="bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Nuestras marcas</h2>

                    <a href="#" title=""
                        class="flex items-center text-base font-medium text-primary-700 hover:underline dark:text-primary-500">
                        Ver más marcas
                        <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                    @foreach ($brands as $b)
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300">
                            <a href="{{ route('brand.products', ['id' => $b->id]) }}">
                                <img class="w-full h-48 object-contain rounded-t-lg" src="{{ asset($b->imagen) }}"
                                    alt="" />
                            </a>
                            <hr class="border-gray-300 dark:border-gray-700">
                            <div class="p-5">
                                <a href="{{ route('brand.products', ['id' => $b->id]) }}">
                                    <h5
                                        class="uppercase mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $b->nombre }}</h5>
                                </a>
                                <a href="{{ route('brand.products', ['id' => $b->id]) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ver más
                                    <svg class="w-3.5 h-3.5 ml-2 relative top-0.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        </section>

    </div>
@endsection

@section('js')
<script>
    window.cartData = @json($cart);
</script>

<!-- Incluir el archivo compilado `cart.js` -->
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
