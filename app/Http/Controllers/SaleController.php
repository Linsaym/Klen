<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        return Sale::query()->select(['sales.id', 'products.name', 'products.price', 'sales.count', 'created_at'])
            ->join('products', 'product_id', '=', 'products.id')->get();
    }

    public function store(Request $request)
    {
        $sale = Sale::create($request->all());
        return Sale::query()->select(['sales.id', 'products.name', 'products.price', 'sales.count', 'created_at'])
            ->join('products', 'product_id', '=', 'products.id')
            ->where('sales.id', $sale['id'])
            ->first();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'count' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'pot_id' => ['nullable', 'integer'],
            'height' => ['required', 'integer'],
            'name' => ['required'],
            'description' => ['nullable'],
        ]);

        $product->update($request->validated());

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
