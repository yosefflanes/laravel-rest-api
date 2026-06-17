<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json($products);
    }

    // cari menggunakan find dan munculkan error
    public function showCuston(int $id){
        $product = Product::find($id);

        if(!$product){
            return response()->json([
                'message' => 'Product Not Found'
            ], 404);
        }

        return response()->json($product);
    }

    // cari menggunakan findOrFail dan munculkan error
    public function show(int $id){
        try {
            $product = Product::findOrFail($id);
            return response()->json($product);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Product Not Found'
            ], 404);
        }
    }

    // Validasi di controller
    public function store(Request $request){
        $validated = $request->validate([
            'name' => "required|string|max:255",
            'price' => "required|numeric|min:0",
            'description' => "nullable|string",
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function storeWithFormRequest(StoreProductRequest $request){
        $product = Product::create($request->validated());
        return response()->json($product, 201);
    }

    public function update(Request $request, int $id){
        $validated = $request->validate([
            'name' => "required|string|max:255",
            'price' => "required|numeric|min:0",
            'description' => "nullable|string",
        ]);

        $product = Product::find($id);
        $product->update($validated);
        return response()->json($product);
    }
}
