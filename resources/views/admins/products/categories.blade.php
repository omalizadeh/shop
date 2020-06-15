<div class='card card-small mb-3'>
    <div class="card-header border-bottom">
        <h6 class="m-0">دسته بندی ها</h6>
    </div>
    <div class='card-body p-0'>
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-3 pb-2">
                @forelse($categories as $category)
                @if(!$category->hasParent())
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}"
                        class="custom-control-input" id="{{ 'category' }}-{{ $category->id }}" @if(isset($product) &&
                        $product->categories->contains('id',$category->id)) checked @endif>
                    <label class="custom-control-label"
                        for="{{ 'category' }}-{{ $category->id }}">{{ $category->getName() }}</label>
                </div>
                @foreach ($category->childs as $child)
                <div class="custom-control custom-checkbox mb-1 mr-4">
                    <input type="checkbox" name="category_ids[]" value="{{ $child->id }}" class="custom-control-input"
                        id="{{ 'child' }}-{{ $child->id }}" @if(isset($product) &&
                        $product->categories->contains('id',$child->id)) checked @endif>
                    <label class="custom-control-label"
                        for="{{ 'child' }}-{{ $child->id }}">{{ $child->getName() }}</label>
                </div>
                @endforeach
                @endif
                @empty
                دسته بندی ثبت نشده است
                @endforelse
            </li>
            <li class="list-group-item px-3">
                <div class="form-row">
                    {{-- <div class="form-group col-lg-12">
                        <input type="text" id="CategoryName" class="form-control" placeholder="دسته بندی جدید"
                            aria-label="دسته بندی انتخب کنید" aria-describedby="basic-addon2">
                    </div> --}}
                    <div class="form-group col-lg-12">
                        <label for="default_category_id">دسته بندی پیش فرض</label>
                        <select class="form-control" name="default_category_id" required>
                            <option value="">دسته بندی پیش فرض...</option>
                            @forelse($categories as $category)
                            <option value="{{ $category->id }}" @if(isset($product) && $product->
                                getDefaultCategory()->id === $category->id )
                                selected
                                @endif>{{ $category->getName() }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>