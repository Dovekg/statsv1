<!-- Comments -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-semiold"><i class="icon-bubbles4 position-left"></i>评论</h5>
        <div class="heading-elements">
            <button type="button" class="btn bg-blue" data-toggle="modal" data-target="#modal_add_comment"><i class="icon-plus22"></i>添加评论</button>
        </div>
    </div>

    <div class="panel-body">
        <ul class="media-list content-group-lg stack-media-on-mobile">
            @if(!count($task->comments))
                <li>还没有任何人评论，你可以点击“添加评论”来提交你的建议！</li>
            @else
                @foreach($task->comments as $comment)
                    <li class="media">
                        <div class="media-left">
                            <a href="#"><img src="{{ $comment->user->avatar }}" class="img-circle img-sm" alt=""></a>
                        </div>

                        <div class="media-body">
                            <div class="media-heading">
                                <a href="#" class="text-semibold">{{ $comment->user->name }}</a>
                                <span class="media-annotation dotted">{{ $comment->created_at }}</span>
                            </div>

                            <p>{{ $comment->body }}</p>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
<!-- /comments -->
<!-- comment modal -->
<div id="modal_add_comment" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">添加评论</h5>
            </div>

            <form action="{{ route('dashboard.comments.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="task_id" value="{{ $task->id }}">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>内容</label>
                                <textarea rows="5" cols="5" name="body" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">提交评论</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- comment modal -->