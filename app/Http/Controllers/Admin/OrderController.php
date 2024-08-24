<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        DB::beginTransaction();

        try {
            $paymentImage = $request->file('payment_image');
            $data = $request->all();
            if ($paymentImage && $paymentImage->isValid()) {
                $imagePath = $paymentImage->store('orders');
                $data['payment_image'] = $imagePath;
            } else {
                $data['payment_image'] = null; // Asegura que el campo sea nulo si no se carga una imagen
            }

            // Crea la orden
            $order = Order::create([
                'user_id' => $data['user_id'],
                'order_number' => $data['order_number'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'document_type' => $data['document_type'],
                'document_number' => $data['document_number'],
                'address' => $data['address'],
                'department' => $data['department'],
                'province' => $data['province'],
                'district' => $data['district'],
                'zone' => $data['zone'],
                'reference' => $data['reference'],
                'payment_method_id' => $data['payment_method_id'],
                'payment_image' => $data['payment_image'],
                'payment_date' => $data['payment_date'],
                'operation_code' => $data['operation_code'],
                'total' => $data['total'],
            ]);

            // Obtener el ID de la orden recién creada
            $orderId = $order->id;

            // Procesa los detalles de la orden
            $detalles = json_decode($data['detalles'], true);

            // Verificar que la decodificación fue exitosa y que hay items
            if ($detalles && isset($detalles['items'])) {


                foreach ($detalles['items'] as $item) {
                    // Crear un nuevo detalle del pedido
                    OrderDetail::create([
                        'order_id' => $orderId,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'subtotal' => $item['price'] * $item['quantity']
                    ]);
                }
            }
            $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
            // Confirmar la transacción
            DB::commit();  
            // Limpiar el carrito de la sesión
            session()->forget('cart');
            // Enviar el correo de confirmación
            Mail::to($order->email)->send(new OrderConfirmationMail($order, $detalles));

            // Devolver una respuesta JSON con el ID de la orden
            return response()->json(['order_id' => $orderId]);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            return redirect()->back()->withErrors('Ocurrió un error: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
