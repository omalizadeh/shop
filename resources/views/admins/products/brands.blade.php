<div class='card card-small mb-3'>
    <div class="card-header border-bottom">
        <h6 class="m-0">برند</h6>
    </div>
    <div class='card-body p-0'>
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-3 pb-2">
                @forelse($brands as $brand)
                <div class="custom-control custom-checkbox mb-1">
                    <input type="radio" name="brand_id" value="{{ $brand->id }}" class="custom-control-input"
                        id="{{ 'Brand' }}-{{ $loop->index }}" @if(isset($product) && $product->getBrandId() ==
                    $brand->id) checked @endif>
                    <label class="custom-control-label"
                        for="{{ 'Brand' }}-{{ $loop->index }}">{{ $brand->getName() }}</label>
                </div>
                @empty
                برند ثبت نشده است
                @endforelse
            </li>
        </ul>
    </div>
</div>