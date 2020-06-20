<div class="thread thread_review">
    <ul class="media-list thread-list rtl">
        @forelse($reviews as $review)
            @if($review->status == 'show' or $review->user_id == auth()->id() )
                <li class="single-thread">
                    <div class="media">
                        <div class="media-right">
                            <img class="media-object rounded-circle" src="{{ $review->user->avatar }}"
                                 alt="{{ $review->user->name .' تصویر کاربری ' }}" style="width: 65px;height: 65px;">
                        </div>
                        <div class="media-body">
                            <p class="p-3 text-justify">
                                <span class="h5">{{ $review->user->name }} در اینباره میگه که : </span>
                                {{ $review->comment }}
                            </p>
                            <div class="pull-left">
                                <div class="rating product--rating">
                                    <ul>
                                        @for ($i = 0; $i < 5; ++$i)
                                            <li>
                                                @if(round($i) < $review->range)
                                                    <span class="fa fa-star{{ $review->range <= $i ? '-o' : '' }}"
                                                          aria-hidden="true"></span>
                                                @else
                                                    <span class="fa fa-star{{ $review->range < $i ? '-o' : '-half' }} text-warning"
                                                          aria-hidden="true"></span>
                                                @endif
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                                <span class="review_tag {{ 'bg-'.$review->range_text['bg'] }}">{{ $review->range_text['text'] }}</span>
                                |
                                @if($review->status == 'check')
                                    <span class="review_tag {{ 'bg-warning' }}">{{ 'در درست بازبینی' }}</span> |
                                @endif
                                <span>{{ jdate($review->created_at)->ago() }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            @else

            @endif
        @empty
            <div class="alert alert-warning">هیچ بازخوردی ثبت نشده است</div>
        @endforelse
    </ul>
@if(auth()->check())
    <!-- comment reply -->
        <div class="media depth-2 reply-comment">
            <div class="media-left">
                <img class="media-object rounded-circle" style="width: 70px; height: 70px;"
                     src="{{ auth()->user()->avatar }}"
                     alt="{{ auth()->user()->name }}">
            </div>
            <div class="media-body p-3">
                <form action="" method="post" class="comment-reply-form">
                    <span>میزان امتیاز</span>
                    <div class="starrating risingstar rtl">
                        <input type="radio" id="star5" required name="range" value="5"/><label for="star5"
                                                                                               title="5 star"></label>
                        <input type="radio" id="star4" required name="range" value="4"/><label for="star4"
                                                                                               title="4 star"></label>
                        <input type="radio" id="star3" required name="range" value="3"/><label for="star3"
                                                                                               title="3 star"></label>
                        <input type="radio" id="star2" required name="range" value="2"/><label for="star2"
                                                                                               title="2 star"></label>
                        <input type="radio" id="star1" required name="range" value="1"/><label for="star1"
                                                                                               title="1 star"></label>
                    </div>
                    <input type="hidden" value="{{ $model['type'] }}" name="model_type">
                    <input type="hidden" value="{{ $model['id'] }}" name="model_id">
                    @csrf
                    <textarea class="bla" required name="comment" placeholder="نظر خود را بنویسید"></textarea>
                    <button class="btn btn--md btn-primary">ارسال نظر</button>
                </form>
            </div>
        </div>
        <!-- comment reply -->
    @else
        <div class="alert alert-info">برای ارسال بازخورد باید <a href="{{ route('login') }}"> وارد </a>شوید </div>
    @endif
</div>