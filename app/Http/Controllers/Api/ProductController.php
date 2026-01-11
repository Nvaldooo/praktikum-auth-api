<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // 1. Mengambil semua data produk
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Produk',
            'data'    => $products
        ], 200);
    }

    // 2. Menyimpan produk baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'sku'   => 'required|unique:products',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk Berhasil Ditambahkan',
            'data'    => $product
        ], 201);
    }

    // 3. Menampilkan satu produk spesifik
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Produk',
                'data'    => $product
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Produk Tidak Ditemukan',
        ], 404);
    }

    // 4. Memperbarui data produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk Berhasil Diperbarui',
            'data'    => $product
        ], 200);
    }

    // 5. Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk Berhasil Dihapus',
        ], 200);
    }
}