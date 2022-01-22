<?php

namespace App\Http\Controllers;

use App\Models\OrderRepartidore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderRepartidoreController extends Controller
{
    public function Orders(Request $request)
    {
        $orders = DB::select('call SP_Orders ('.$request->repartidore_id.', '.$request->fechaEntrega.');');
        $array = [];

        foreach ($orders as $order) {
            $array[] = [json_decode($order->direccion), $order];
        }
        return response()->json($array, status:200);
    }
}
