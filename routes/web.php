<?php

use Illuminate\Support\Facades\Route;
use App\http\Middleware\Cors;

Route::get('/', function () {return view('welcome');});
