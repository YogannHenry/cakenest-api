<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderCupcake;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        // Validation des données entrantes...

        $order = Order::create($request->all());

        // Ajouter les cupcakes à la commande
        foreach ($request->cupcakes as $cupcake) {
            $order->cupcakes()->attach($cupcake['cupcake_id'], [
                'quantity' => $cupcake['quantity'],
                'price' => $cupcake['price'],
            ]);
        }

        return response()->json($order);
    }

    public function show($id)
    {
        $order = Order::with('cupcakes')->find($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        // Validation des données entrantes...

        $order = Order::find($id);
        $order->update($request->all());

        // Mettre à jour les cupcakes de la commande
        foreach ($request->cupcakes as $cupcake) {
            $order->cupcakes()->updateExistingPivot($cupcake['cupcake_id'], [
                'quantity' => $cupcake['quantity'],
                'price' => $cupcake['price'],
            ]);
        }

        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json('deleted');
    }
}
