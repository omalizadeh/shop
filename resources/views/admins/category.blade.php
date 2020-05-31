<div class='card card-small mb-3'>
    <div class="card-header border-bottom">
        <h6 class="m-0">دسته بندی ها</h6>
    </div>
    <div class='card-body p-0'>
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-3 pb-2">
                @forelse($categories as $category)
                    <div class="custom-control custom-checkbox mb-1">
                        <input checked type="radio" name="category_id"
                               value="{{ $category->id }}"
                               class="custom-control-input @if($category->parent == 0) ml-2 @endif"
                               id="{{ 'category' }}-{{ $loop->index }}">
                        <label class="custom-control-label"
                               for="{{ 'category' }}-{{ $loop->index }}">{{ $category->name }}</label>
                    </div>
                @empty
                    دسته بندی ثبت نشده است
                @endforelse
            </li>
            <li class="list-group-item d-flex px-3">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <input type="text" id="CategoryName" class="form-control" placeholder="دسته بندی جدید"
                               aria-label="دسته بندی انتخب کنید"
                               aria-describedby="basic-addon2">
                    </div>
                    <div class="form-group col-lg-12">
                        <select class="form-control" name="parent_id" id="CategoryParent">
                            <option value="0">دسته بندی اصلی</option>
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="input-group-append">
                        <button onclick="AddCategory()" class="btn btn-outline-success btn-sm" style="text-align: left" type="button">
                            <i class="material-icons">add</i>
                            افزودن دسته جدید
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
