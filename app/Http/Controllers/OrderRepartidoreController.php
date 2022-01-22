<?php

namespace App\Http\Controllers;

use App\Models\OrderRepartidore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderRepartidoreController extends Controller
{
    public function Orders(Request $request)
    {
        $orders = DB::select('call SP_Orders ('.$request->repartidore_id.', '.$request->fechaEntrega.');');

        /* for ($i=0; $i < Str::length($orders); $i++) { 
            $direccion = json_decode($orders[$i]->direccion);
            $orders[$i]->direccion = $direccion;
        } */
        foreach ($orders as $order) {
            $direccion = json_decode($order->direccion);
            $order->direccion = $direccion;
        }

        return response()->json($orders, status:200);
    }
}
