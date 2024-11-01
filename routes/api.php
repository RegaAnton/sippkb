<?php

use App\Http\Controllers\Api\PegawaiController;
use Illuminate\Support\Facades\Route;


route::resource('/pegawai', PegawaiController::class);