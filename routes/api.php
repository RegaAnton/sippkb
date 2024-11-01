<?php

use App\Http\Controllers\Api\DivisiController;
use App\Http\Controllers\Api\PegawaiController;
use Illuminate\Support\Facades\Route;


route::resource('/pegawai', PegawaiController::class);
route::resource('/divisi', DivisiController::class);