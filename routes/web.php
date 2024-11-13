<?php

Illuminate\Support\Facades\Route::view('/{any}', 'welcome')->where('any', '.*');
