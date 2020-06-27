<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\removeFromCartRequest;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartController extends Controller
{
    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addProduct(AddToCartRequest $request)
    {
        if (auth()->guest()) {
            return response()->json(['message' => 'برای خرید ابتدا در سایت ثبت نام کنید.']);
        }
        try {
            $this->cartRepository->addProduct($request->input('product_id'));
            return response()->json(['message' => 'محصول به سبد خرید اضافه شد.']);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()]);
        }
    }

    public function removeProduct(removeFromCartRequest $request)
    {
    }

    public function show()
    {
        if (auth()->guest()) {
            abort(404);
        }
        $cart = $this->cartRepository->openCart();
        return view('cart', compact('cart'));
    }
}
