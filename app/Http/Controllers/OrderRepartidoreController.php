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
        return response()->json($orders, $status=200);
    }
}
