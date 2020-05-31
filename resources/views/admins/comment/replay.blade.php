<div id="comment-modal-{{ $comment->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-right">{{ $comment->user->last_name .', '. $comment->user->name  }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="card-text">
                    {{ $comment->text }}
                </p>
                <span class="text-muted">{{ jdate($comment->created_at)->format('l d S F Y') }}</span>
                <hr/>
                <form>
                    <div class="form-group">
                        <label for="name">پاسخ دهنده</label>
                        <input id="name" type="text" disabled="" class="form-control" value="{{ auth()->user()->id.' - '.auth()->user()->last_name.' '.auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="ReplayText-{{ $comment->id }}">متن پاسخ</label>
                        <textarea id="ReplayText-{{ $comment->id }}" class="form-control" name="text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن پنجره شناور</button>
                <button type="button" onclick="Comment('{{ $comment->id }}','SendReplay')" class="btn btn-success">ثبت پاسخ</button>
            </div>
        </div>

    </div>
</div>
<script>
</script>