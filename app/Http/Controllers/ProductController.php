<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return Product::select(
            [
                'products.id',
                'products.name',
                'products.price',
                'products.height',
                'pots.name'
            ])->join('pots','pot_id', '=','pots.id')->get();
    }

    public function getList()
    {
        //TODO Переделать фронтенд на get List страница с продажами
        return Product::select(['id', DB::raw('CONCAT(name, " ", height) AS name')])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'count' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'pot_id' => ['nullable', 'integer'],
            'height' => ['required', 'integer'],
            'name' => ['required'],
            'description' => ['nullable'],
        ]);

        return Product::create($request->validated());
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
