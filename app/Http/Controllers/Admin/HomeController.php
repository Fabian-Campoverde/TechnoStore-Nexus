<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Input;
use App\Models\Invoice;
use App\Models\Measure;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Slider;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $users= User::all()->count();
        $providers= Provider::all()->count();
        $measures= Measure::all()->count();
        $categories= Category::all()->count();
        $products= Product::all()->count();
        $brands= Brand::all()->count();
        
        return view("admin.homepage.index",compact('brands','users','providers','measures','categories','products'));
    }


private function getCommonData()
    {
        $categories = Category::where('estado', 'A')->orderBy('nombre', 'asc')->get();
        $sliders = Slider::where('estado', 'A')->get();
        $brands = Brand::where('estado', 'A')->orderBy('nombre', 'asc')->get();
        $laptops = Product::whereHas('category', function ($query) {
            $query->where('nombre', 'Laptops');
        })->orderBy('nombre', 'asc')->get();
        $pcs = Product::whereHas('category', function ($query) {
            $query->where('nombre', "Pc's");
        })->orderBy('nombre', 'asc')->get();
        $monitores = Product::whereHas('category', function ($query) {
            $query->where('nombre', "Monitores");
        })->orderBy('nombre', 'asc')->get();
        $payment_methods = PaymentMethod::where('estado', 'A')->orderBy('nombre', 'asc')->get();
        $cart = session()->get('cart', []);

        return compact('categories', 'sliders', 'brands', 'payment_methods','laptops','pcs','monitores','cart');
    }

    public function page()
    {
        $data = $this->getCommonData();
        return view('welcome', $data);
    }

    public function show_cart()
    {
        $data = $this->getCommonData();
        return view('cliente.shop_cart', $data);
    }
    public function showProductsByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        $data = $this->getCommonData();
        $data['category'] = $category;
        $data['products'] = $products;

        return view('cliente.category_products', $data);
    }

    public function showProductsByBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $products = Product::where('brand_id', $id)->get();

        $data = $this->getCommonData();
        $data['brand'] = $brand;
        $data['products'] = $products;

        return view('cliente.brand_products', $data);
    }

    public function showProductSelected($id)
    {
        $product = Product::findOrFail($id);
        

        $data = $this->getCommonData();
        $data['product'] = $product;
        

        return view('cliente.view_product', $data);
    }

    public function checkout()
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Redirigir al login con un mensaje si no está autenticado
            return redirect()->route('login')->with('message', 'Debes iniciar sesión para proceder con el pago.');
        }
        $orderNumber = Order::generateOrderNumber(Auth::id());
        
        $data = $this->getCommonData();
        $data['orderNumber'] = $orderNumber;
        // Aquí puedes continuar con el proceso de pago
        // ...

        return view('cliente.checkout',$data); // La vista de checkout o cualquier otra acción
    }

    public function orderConfirmation($orderId)
{
    // Obtener la orden con sus detalles y productos relacionados
    $order = Order::with('orderDetails.product')->findOrFail($orderId);

    // Verificar que la orden pertenece al usuario autenticado
    if ($order->user_id !== auth()->id()) {
        // Redirigir o mostrar un mensaje de error
        return redirect()->route('home.page')->with('error', 'No tienes permiso para ver esta orden.');
    }

    // Obtener los detalles de la orden
    $detalles = $order->orderDetails;
    // Convertir created_at a hora peruana
    $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');

    // Obtener los datos comunes
    $data = $this->getCommonData();
    $data['order'] = $order;
    $data['detalles'] = $detalles;

    // Retornar la vista con los datos
    return view('cliente.order_confirmation', $data);
}
}
