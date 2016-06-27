<h6 class="text-semibold">竞价</h6>
@if(!$task->claimed)
    <div class="content-group-sm">
        <p class="text-semibold">剩余时间：请在24小时之内报价，过时关闭</p>
        <div class="progress progress-xs">
            <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: {{ $percent }}%">
                <span class="sr-only">{{ $percent }}% 完成</span>
            </div>
        </div>
    </div>
@endif
<!-- Daily sales -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">
            需求限定条件

        </h6>
        <div class="heading-elements">
            <div id="ds-Countdown"></div>
            @if($task->closed || $task->completed || $task->claimed || $percent == 100)
                <span class="btn btn-sm bg-grey ml-10"><i class="icon-coin-yen">&nbsp;</i>限制出价</span>
            @else
                <span type="button" id="bid-button" class="btn btn-sm bg-primary ml-10" data-toggle="modal" data-target="#modal_add_bid"><i class="icon-coin-yen">&nbsp;</i>出价</span>
            @endif
        </div>

    </div>

    <div class="table-responsive">
        <table class="table text-nowrap">

            @if(!count($task->bids))
                <p class="ml-20 text-semibold">还没有出价，你可以点击“出价”来提交你的价格！</p>
            @else
                <thead>
                <tr>
                    <th>分析员</th>
                    <th>提交时间</th>
                    <th>所需时间</th>
                    <th>出价</th>
                    <th>认领情况</th>
                </tr>
                </thead>
                <tbody>
                @foreach($task->bids as $bid)
                    <tr>
                        <td>
                            <div class="media-left media-middle">
                                <a href="#"><img src="{{ $bid->user->avatar }}" class="img-circle img-sm" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-heading">
                                    <span href="#" class="letter-icon-title">{{ $bid->user->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted text-size-small">{{ $bid->created_at }}</span>
                        </td>
                        <td>
                            <span class="text-semibold no-margin">{{ $bid->time }}天</span>
                        </td>
                        <td>
                            <h6 class="text-semibold no-margin">${{ $bid->price }}</h6>
                        </td>
                        @if(!$task->claimed && Auth::user()->id == $bid->bid_user_id)
                            <td>
                                {!! Form::open(['route' => ['dashboard.tasks.claim', $task->id], 'method' => 'patch', 'class' => ' display-inline-block']) !!}
                                <input type="hidden" name="user_id" value="{{ $bid->bid_user_id }}">
                                <button type="submit" onclick="return confirm('确认认领该任务？')" class="btn bg-teal-400 btn-sm btn-labeled btn-labeled-right heading-btn">认领
                                    <b>
                                        <i class="icon-arrow-right5"></i>
                                    </b>
                                </button>
                                {!! Form::close() !!}
                            </td>
                            @elseif($task->claimed_user_id == $bid->bid_user_id)
                            <td>
                                <span class="btn btn-sm bg-grey ml-10"><i class="icon-coin-yen">&nbsp;</i>已认领</span>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>

            @endif

        </table>
    </div>


</div>
<!-- /daily sales -->


<!-- comment modal -->
<div id="modal_add_bid" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">出价</h5>
            </div>

            {!! Form::open(['route' => ['dashboard.tasks.bid', $task->id], 'method' => 'patch']) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>所需时间：</label>
                                    <input name="time" type="number" placeholder="天" class="form-control">
                                    <span class="help-block">请给出大致时间</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>价格：</label>
                                    <input name="price" type="number" placeholder="1,000元" class="form-control">
                                    <span class="help-block">请给出整数价格</span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">提交竞价</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
<!-- comment modal -->