<div class="border">
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            {{--<img src="{{ asset($media[0]['patch'].$media[0]['name'] ) }}" alt="{{ $media[0]['name'] }}">--}}
            @forelse($media as $item)
                <div class="carousel-item @if($loop->first) active @endif">
                    <center>
                        <img class="d-block " src="{{ asset($item['patch'].$item['name']) }}" alt="{{ $item['name'] }}">
                    </center>
                </div>
            @empty
            @endforelse
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
        <ol class="carousel-indicators">
            @for($i = 0 ; $i <= count($media) ; $i++)
                <li data-target="#carousel-thumb" data-slide-to="{{ $i }}" @if($i == 0) class="active" @endif></li>
            @endfor
        </ol>
    </div>
</div>
