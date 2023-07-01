<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function artisan(Request $request) {
        if(isset($request->call)) {
            Artisan::call($request->call);
            return "Artisan call " . $request->call;
        }
    }

    public function index() {
        $data["lates"] = Product::orderBy('created_at', 'desc')->limit(10)->get();
        return view('home.home', $data);
    }
}
