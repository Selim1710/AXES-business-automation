<?php

namespace App\Http\Controllers;

use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class SalesEstimateInvoiceController extends Controller
{
    public function index()
    {
        return view('salesEstimateInvoice.salesEstimateInvoiceView',[
            'products' => Product::all(),
        ]);

    }
    public function getPrice()
    {
        $productId = $_GET['id'];
        $product = Product::find($productId);
        return response()->json([
            'price' => $product->price,
        ]);
    }
}
