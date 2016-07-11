@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="panel panel-flat border-left-info-600">
            <div class="panel-heading">
                <h6 class="panel-title">"{{$team->name}}" 的组员</h6>
                <div class="heading-elements">
                    <a href="{{route('teams.index')}}" class="btn btn-sm btn-default pull-right">
                        <i class="icon-arrow-left5"></i> 返回
                    </a>
                </div>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>用户名</th>
                        <th>角色</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    @foreach($team->users AS $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->isOwnerOfTeam($team))
                                    <span class="label label-success">组长</span>
                                @else
                                    <span class="label label-primary">组员</span>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->isOwnerOfTeam($team))
                                    @if(auth()->user()->getKey() !== $user->getKey())
                                        <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> 删除</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table></div>
            </div>
        </div>
        <div class="panel panel-flat border-left-warning-600">
            <div class="panel-heading">
                <h6 class="panel-title">邀请中组员</h6>
                </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>邮箱地址</th>
                        <th>重新发送邀请邮件</th>
                    </tr>
                    </thead>
                    @foreach($team->invites AS $invite)
                        <tr>
                            <td>{{$invite->email}}</td>
                            <td>
                                <a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-sm btn-default">
                                    <i class="icon-envelop"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                    </div>
            </div>
        </div>


        <div class="panel panel-flat border-left-success">
            <div class="panel-heading">
                <h6 class="panel-title">添加新邀请</h6>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">邮箱地址：</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">发送邀请链接<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
