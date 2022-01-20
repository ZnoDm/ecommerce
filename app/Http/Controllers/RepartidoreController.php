<?php

namespace App\Http\Controllers;

use App\Models\Repartidore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class RepartidoreController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $request->password = Hash::make($request->password);

        Repartidore::create($input);

        User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email
        ]);

        return response()->json([
            'res' => true,
            'message' => 'Repartidor registrado correctamente.'
        ], status:200);
    }

    public function login(Request $request)
    {
        $user = User::where('email','=',$request->email)->first();
        if (!is_null($user) && Hash::check($request->password, $user->password))
        {
            $user->api_token = Str::random(length:100);
            $user->save();

            auth()->login($user);

            return response()->json([
                'res' => true,
                'token' => $user->api_token,
                'message' => 'Logueado',
                'usuario' => auth()->user()
            ], status:200);
        }
        else
        {
            return response()->json([
                'res' => false,
                'message' => 'Incorrecto'
            ], status: 200);
        }
    }

    public function logout()
    {
            
    }

    public function getRepartidores()
    {
        $repartidores = Repartidore::all();

        return response()->json($repartidores, $status = 200);
    }
}
