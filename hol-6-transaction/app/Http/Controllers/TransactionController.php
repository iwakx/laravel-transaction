<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Exception;

class TransactionController extends Controller
{
    public function handleTransaction() {
        
        DB::beginTransaction();

        try {

            $product1 = Product::find(1);
            $product1->price = $product1->price + 10;
            $product1->save();

            $product2 = new Product();
            $product2->name = "Produk Baru";
            $product2->description = "Deskripsi Produk Baru";
            $product2->price = 100;
            $product2->stock = 10;
            $product2->save();

            DB::commit();
            return "Transaksi Berhasil!";

        } catch (Exception $e) {
            DB::rollBack();

            return "Transaksi Gagal. <br/> Error : " . $e->getMessage();
        }
    }
}
