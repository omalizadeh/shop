<?php

namespace App\Repositories;

use App\Cart;
use App\Product;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
    public function all()
    {
        return Cart::all();
    }

    public function except(array $ids)
    {
        return Cart::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Cart::create($data);
    }

    public function update(array $data, $id)
    {
        return Cart::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Cart::CARTS_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Cart::findOrFail($id);
    }

    public function addProduct($productId)
    {
        return DB::transaction(function () use ($productId) {
            $product = Product::findOrFail($productId);
            $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id, 'is_ordered' => false]);
            $cart->products()->attach($product->id, ['total_price' => $product->getPrice()]);
        });
    }

    public function removeProduct(Cart $cart, $productId)
    {
        return $cart->products()->detach($productId);
    }
}
