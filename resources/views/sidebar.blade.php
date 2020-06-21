<div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0">
    <span class="offcanvas-close"><i class="fe-icon-x"></i></span>
    <!-- Categories-->
    <div class="widget widget-categories">
        <h4 class="widget-title">دسته بندی</h4>
        <ul>
            @forelse($categories as $category)
            @if(!$category->hasParent())
            <li><a href="#categoryItem-{{ $loop->index }}" data-toggle="collapse">{{ $category->getName() }}</a>
                <div class="collapse @if($loop->first) show @endif" id="categoryItem-{{ $loop->index }}">
                    <ul>
                        <li><a href="{{ route('categories.show',$category->getSlug()) }}">{{ $category->getName() }}</a>
                        </li>
                        @forelse($category->childs as $child)
                        <li><a href="{{ route('categories.show',$child->getSlug()) }}">{{ $child->getName() }}</a></li>
                        @empty

                        @endforelse
                    </ul>
                </div>
            </li>
            @endif
            @empty
            @endforelse
        </ul>
    </div>

    <div class="widget widget-categories">
        <h4 class="widget-title">برند</h4>
        <ul>
            @forelse($brands as $brand)
            <li><a href="{{ route('brands.show',$brand->getSlug()) }}" target="_blank">{{ $brand->getName() }}</a></li>
            @empty
            @endforelse
        </ul>
    </div>
</div>