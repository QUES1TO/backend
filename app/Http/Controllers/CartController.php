<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\SelectedProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart=null;
        $inputs = $request->all();
        
        $inputs["total"] = 0;
        if($request->input('id')==0)
        {
            $cart =Cart::create($inputs);
        }
        else{
            $cart =Cart::findOrFail($request->input('id'));
        }
        $selectedProduct = SelectedProduct::create([
            "amount"=>$request->input('amount'),
            "product_id"=>$request->input('product_id'),
            "cart_id"=> $cart->id
        ]);
        $selectedProducts = SelectedProduct::where("cart_id","=",$cart->id)->get();
        $total=0;
        foreach($selectedProducts as $singleSelected)
        {
            $product = Product::findOrFail($singleSelected->product_id);
            $subtotal = $product->product_price * $singleSelected->amount;
            $total = $total + $subtotal;
        }
        $cart->total=$total;
        $cart->save();
        $respuesta = [
            "cart_id"=> $cart->id
        ];
        return $this->jsonControllerResponse( $respuesta,201,true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return $this->jsonControllerResponse( $cart->products,200,true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
