<?php

use App\Http\Resources\EmpleadosResource;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/empleados',function(){
    $relations=['departamentos','nacionalidades','tiposdecontrato'];
    $empleados = Empleados::orderBy('apellido')->get();
    return EmpleadosResource::collection($empleados);
});
