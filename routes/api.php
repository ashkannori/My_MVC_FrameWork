<?php

use Core\Router\Api\Route;

Route::get("create_user", [\App\Http\Controllers\UserControllersApi::class, 'users']);