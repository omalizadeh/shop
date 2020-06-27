@extends('layouts.app')
@section('title')
سبدخرید
@endsection
@section('load')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post">
                <div class="m-5">
                    @forelse($cart->products as $product)
                    <div class="cart-item d-md-flex justify-content-between" id=#CartTable-{{ $product->id }}">
                        <span onclick="RemoveFormCart('{{ $product->id }}')" class="remove-item"><i
                                class="fe-icon-x"></i></span>
                        <div class="px-3 my-3">
                            <a class="cart-item-product" href="{{ route('products.show' , $product->getSlug()) }}">
                                <div class="cart-item-product-thumb">
                                    <img src="{{ URL::to($product->images()->first()->getURL()) }}"
                                        alt="{{$product->getName()}}"></div>
                                <div class="cart-item-product-info">
                                    <h4 class="cart-item-product-title">
                                        {{ $product->getName() }}
                                    </h4>
                                    <span><strong>دسته بندی:</strong> {{ "-" }}</span>
                                    <span><strong>برند:</strong> {{ "-" }}</span>
                                </div>
                            </a></div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">تعداد</div>
                            <div class="count-input">
                                <label for="Count"></label>
                                <input type="hidden" name="product[{{ $product->id }}][id]" value="{{ $product->id }}">
                                <select onchange="ChangePrice('{{ $cart->id }}','{{ $product->price }}')"
                                    id="Count-{{ $cart->id }}" name="product[{{ $product->id }}][count]"
                                    class="form-control">
                                    <option value="{{ '1' }}">{{ '1' }}</option>
                                    @for($i = 2 ; $i <= $product->getStock() ; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">قیمت واحد</div><span class="text-xl font-weight-medium">
                                {{ number_format($product->price) . ' هزارتومان ' }}
                            </span>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">هزینه کل
                            </div>
                            <span class="text-xl font-weight-medium" id="TotalPrice-{{ $cart->id }}">
                                {{ number_format($product->price) . ' هزارتومان ' }}
                            </span>
                        </div>
                    </div>
                    <!-- Cart Item-->
                    @empty
                    <div class="alert alert-danger alert-dismissible fade show text-center mb-30">
                        <span></span><i class="fe-icon-award"></i>&nbsp;
                        سبد خرید خالی میباشد
                    </div>
                    @endforelse
                    <!-- Coupon + قیمت واحد-->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Coupon">کد تخفیف دارید؟</label>
                                <input onchange="Gift()" type="text" id="Coupon" name="coupon"
                                    class="form-control col-lg-12" placeholder="کد تخفیف خود را وارد کنید">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            @if(count($cart->products) > 0)
                            <div class="row pt-3 pb-5 mb-2">
                                {{ csrf_field() }}
                                <div class="col-sm-6 mb-3"><a class="btn btn-secondary btn-block" href="#"><i
                                            class="fe-icon-refresh-ccw"></i>&nbsp;بروزرسانی سبد خرید</a></div>
                                <div class="col-sm-6 mb-3"><button type="submit" class="btn btn-primary btn-block"><i
                                            class="fe-icon-credit-card"></i>&nbsp;پرداخت</button></div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('head')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script> --}}
{{-- 
<script>
    function RemoveFormCart(id) {
            $.ajax({
                url: '{{ route('cart.index') }}/' + id,
type: 'post',
data:{
_method: 'DELETE',
_token: '{{ csrf_token() }}'
},
success:function (data) {
alert(data.message);
$('#CartTable-'+id).hide();
setTimeout(function () {
location.reload();
},4 000);
}
});
}
function ChangePrice(id,price){
var count = $("#Count-"+id).val();
var price = numeral(price * count).format('0,0');
$("#TotalPrice-"+id).empty().append(price+" هزار تومان ");
}
function Gift(){
alert("کد وارد شده فاقد اعتبار میباشد");
console.log($("#Coupon").val());
}
</script>
--}}
@endsection