<?php

namespace App\Http\Controllers;

use App\models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function add()
    {
        return view("products.add");
    }

    public function store(Request $request) {
        $files = [];
        foreach ($request->file('images') as $key => $imagefile) {
            $filename = Carbon::now()->format("Ymdhis") . $key . "." . $imagefile->extension();
            $path = $imagefile->move(public_path('/storage/products'), $filename);
            $files[] = '/storage/products/' . $filename;
        }

        Product::create([
            "name" => $request->name,
            "user_id" => Auth::user()->id,
            "start_price" => (int)$request->start_price,
            "adding_per_bid" => (int)$request->adding_per_bid,
            "end_bid" => Carbon::parse($request->end_bid),
            "descriptions" => $request->description,
            "images" => json_encode($files)
        ]);

        toastr()->success("Congratulation your product now available on app!", "Nice!");
        return redirect()->to("/");
    }
}
