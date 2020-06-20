<div class="thread">
    <ul class="media-list thread-list border-0 shadow-0">
        <style>
            #author-info {
                 box-shadow: 1px 1px 7px rgba(0,0,0,0) !important;
                border-right: 3px solid #0a8cf0;

            }
        </style>
        @forelse($comments as $comment)
            @if($comment->status == 'show' or $comment->user_id == auth()->id() )
                <div id="author-info">
                    <div id="author-image">
                                    <span>
                                        <img alt="" src="{{ $comment->user->avatar }}" class="avatar avatar-80 photo"
                                             height="80" width="80">
                                    </span>
                    </div>
                    <div id="author-bio">
                        <p class="author-info-title">
                            <span class="iran-sans" rel="author external">{{ $comment->user->name . ' '.$comment->user->last_name }}</span>
                        </p>
                        <p class="author-info-description" style="font-size: 15px;">
                            {{ $comment->text }}
                        </p>
                    </div>
                </div>
            @else
            @endif
        @empty
        @endforelse
    </ul>
    @if(auth()->check())
        <div class="comment-form-area">
            <!-- comment reply -->
            <div class="media comment-form">
                <div class="media-left">
                    <img class="media-object rounded-circle" style="width: 75px;height: 75px; margin: -10%; padding: 5%;" src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                </div>
                <div class="media-body">
                    <form action="{{ route('comment.store') }}" method="post" class="comment-reply-form">
                        <input type="hidden" value="{{ $model['type'] }}" name="model_type">
                        <input type="hidden" value="{{ $model['id'] }}" name="model_id">
                        @csrf
                      <div class="form-group mt-4">
                        <label for="text"></label>
                        <textarea id='text' style="min-height:200px;border-radius: 10px" name="text" rows="" cols="" placeholder="توضیحات پیام" class="form-control p-1"></textarea>
                      </div>
                      <p class="mailpoet_paragraph" >
                        <input type="submit" class="mailpoet_submit" value="ارسال تیکت" data-automation-id="subscribe-submit-button">
                        <span class="mailpoet_form_loading"><span class="mailpoet_bounce1"></span>
                                    <span class="mailpoet_bounce2"></span>
                                    <span class="mailpoet_bounce3"></span>
                                </span>
                      </p>
                    </form>
                </div>
            </div>
            <!-- comment reply -->
        </div>
    @else
        <div class="alert alert-info">برای ارسال دیدگاه باید <a href="{{ route('login') }}"> وارد </a>شوید </div>

    @endif
</div>




