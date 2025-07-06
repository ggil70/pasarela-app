<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RolUsuarioController; 
use \App\Http\Controllers\ApiController; 
use \App\Http\Controllers\AliadoController; 
use \App\Http\Controllers\UsuarioController; 
use \App\Http\Controllers\UsuarioAdmController; 
use \App\Http\Controllers\ApiAliadoController; 

Route::get('/home', function () {
        return view('home/presentacion');
    })->name('home');



//rutas de los roles
Route::get('/rol_index', [RolUsuarioController::class,'index'])->name('index_rol');
Route::get('/rol_update/{id}', [RolUsuarioController::class,'edit'])->name('rol_update');
Route::post('/save_updateRol', [RolUsuarioController::class,'save_update'])->name('save_updateRol');
Route::get('/rol_delete/{id}', [RolUsuarioController::class,'rol_delete'])->name('rol_delete');
Route::post('/delete_rol', [RolUsuarioController::class,'delete'])->name('delete_rol');
Route::get('/rol_add', [RolUsuarioController::class,'create'])->name('rol_add');
Route::post('/save_incluirRol', [RolUsuarioController::class,'save_create'])->name('save_incluirRol');

//rutas de las api
Route::get('/api_index', [ApiController::class,'index'])->name('index_api');
Route::get('/api_update/{id}', [ApiController::class,'edit'])->name('api_update');
Route::post('/save_updateApi', [ApiController::class,'save_update'])->name('save_updateApi');
Route::get('/api_delete/{id}', [ApiController::class,'api_delete'])->name('api_delete');
Route::post('/delete_api', [ApiController::class,'delete'])->name('delete_api');
Route::get('/api_add', [ApiController::class,'create'])->name('api_add');
Route::post('/save_incluirApi', [ApiController::class,'save_create'])->name('save_incluirApi');




//rutas de las aliado
Route::get('/aliado_index', [AliadoController::class,'index'])->name('index_aliado');
Route::get('/aliado_update/{id}', [AliadoController::class,'edit'])->name('aliado_update');

Route::post('/save_updateAliado', [AliadoController::class,'save_update'])->name('save_updateAliado');

Route::get('/aliado_delete/{id}', [AliadoController::class,'aliado_delete'])->name('aliado_delete');

Route::post('/delete_aliado', [AliadoController::class,'delete'])->name('delete_aliado');






Route::post('/delete_cte', [AliadoController::class,'delete'])->name('delete_cte');
Route::get('/aliado_add', [AliadoController::class,'create'])->name('aliado_add');
Route::post('/save_incluirAliado', [AliadoController::class,'save_create'])->name('save_incluirAliado');

Route::get('/aliado_detalle/{id}', [AliadoController::class,'aliado_detalle'])->name('aliado_detalle');

Route::get('/afiliar_apis', [AliadoController::class,'afiliar_apis'])->name('afiliar_apis');
Route::get('/apis_detalle/{id}', [AliadoController::class,'apis_detalle'])->name('apis_detalle');

Route::get('/act_aliado', [AliadoController::class,'act_aliado'])->name('act_aliado');

Route::get('/aliado_activar/{id}', [AliadoController::class,'aliado_activar'])->name('aliado_activar');

Route::post('/change_activar', [AliadoController::class,'change_activar'])->name('change_activar');

Route::get('/log_activar/{id}', [AliadoController::class,'log_activar'])->name('log_activar');


//---------------------------------------------Apis / Clientes  --------------------------------------
//Asignar Apis
Route::get('/asignar_api', [ApiAliadoController::class,'asignar_api'])->name('asignar_api');
Route::get('/aliado_apis/{id}', [ApiAliadoController::class,'aliado_apis'])->name('aliado_apis');
Route::post('/save_api_aliado', [ApiAliadoController::class,'save_api_aliado'])->name('save_api_aliado');






//Usuario
Route::get('/', [UsuarioController::class,'index'])->name('inicio');
Route::post('/validar_acceso', [UsuarioController::class,'validar_acceso'])->name('validar_acceso');
Route::get('/olvido_clave', [UsuarioController::class,'olvido_clave'])->name('olvidoClave');
Route::post('/validar_olvido', [UsuarioController::class,'validar_olvido'])->name('validar_olvido');
Route::post('/validar_codigo', [UsuarioController::class,'validar_codigo'])->name('validar_codigo');
Route::post('/cambiar_clave', [UsuarioController::class,'cambiar_clave'])->name('cambiar_clave');


//act usuarios Aliado
Route::get('/usuario_index', [UsuarioController::class,'usuario_index'])->name('usuario_index');
Route::get('/usuario_add', [UsuarioController::class,'create'])->name('usuario_add');
Route::get('/usuario_delete/{id}', [UsuarioController::class,'usuario_delete'])->name('usuario_delete');
Route::get('/usuario_update/{id}', [UsuarioController::class,'edit'])->name('usuario_update');
Route::post('/save_incluirUsuario', [UsuarioController::class,'save_create'])->name('save_incluirUsuario');
Route::post('/save_updateUsuario', [UsuarioController::class,'save_update'])->name('save_updateUsuario');
Route::get('/usuario_delete/{id}', [UsuarioController::class,'usuario_delete'])->name('usuario_delete');
Route::post('/delete_usuario', [UsuarioController::class,'delete'])->name('delete_usuario');



//act usuarios Portal
Route::get('/usuarioAdm_index', [UsuarioAdmController::class,'usuarioAdm_index'])->name('usuarioAdm_index');
Route::get('/usuarioAdm_add', [UsuarioAdmController::class,'create'])->name('usuarioAdm_add');
Route::get('/usuarioAdm_delete/{id}', [UsuarioAdmController::class,'usuario_delete'])->name('usuarioAdm_delete');
Route::get('/usuarioAdm_update/{id}', [UsuarioAdmController::class,'edit'])->name('usuarioAdm_update');

Route::post('/save_incluirUsuarioAdm', [UsuarioAdmController::class,'save_create'])->name('save_incluirUsuarioAdm');
Route::post('/save_updateUsuarioAdm', [UsuarioAdmController::class,'save_update'])->name('save_updateUsuarioAdm');
Route::get('/usuarioAdm_delete/{id}', [UsuarioAdmController::class,'usuarioAdm_delete'])->name('usuarioAdm_delete');
Route::post('/delete_usuarioAdm', [UsuarioAdmController::class,'delete'])->name('delete_usuarioAdm');








/*
Route::post('/validar_codigo', [UsuarioController::class,'validar_codigo'])->name('validar_codigo');

Route::post('/cambiar_clave', [UsuarioController::class,'cambiar_clave'])->name('cambiar_clave');


Route::get('/registrarse', [UsuarioController::class,'registrarse'])->name('registrarse');
*/







