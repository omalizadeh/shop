<div class='card card-small mb-3'>
    <div class="card-header border-bottom">
        <h6 class="m-0">تولید کننده ها</h6>
    </div>
    <div class='card-body p-0'>
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-3 pb-2">
                @forelse($brands as $brand)
                    <div class="custom-control custom-checkbox mb-1">
                        <input checked type="radio" name="brand_id"
                               value="{{ $brand->id }}"
                               class="custom-control-input @if($brand->parent == 0) ml-2 @endif"
                               id="{{ 'Brand' }}-{{ $loop->index }}">
                        <label class="custom-control-label"
                               for="{{ 'Brand' }}-{{ $loop->index }}">{{ $brand->name }}</label>
                    </div>
                @empty
                    تولید کننده ثبت نشده است
                @endforelse
            </li>
            <li class="list-group-item d-flex px-3">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <input type="text" id="BrandName" class="form-control" placeholder="تولید کننده جدید"
                               aria-label="تولید کننده انتخب کنید"
                               aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group-append">
                        <button onclick="AddBrand()" class="btn btn-outline-success btn-sm" style="text-align: left" type="button">
                            <i class="material-icons">add</i>
                            افزودن تولید کننده جدید
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
