<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class APIController extends Controller
{
    public function search(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'nullable|string|max:255',
            'product_category' => 'nullable|string|max:255',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
        ]);

        $query = products::query();

        if (!empty($validated['product_name'])) {
            $query->where('product_name', 'like', '%' . $validated['product_name'] . '%');
        }

        if (!empty($validated['product_category'])) {
            $query->where('product_category', $validated['product_category']);
        }

        if (!empty($validated['min_price'])) {
            $query->where('product_price', '>=', $validated['min_price']);
        }

        if (!empty($validated['max_price'])) {
            $query->where('product_price', '<=', $validated['max_price']);
        }

        $products = $query->get();

        return response()->json($products)->header('Access-Control-Allow-Origin','*');
    }
}
