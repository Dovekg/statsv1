@extends('layouts.dashboard')
@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">分析小组</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">小组</span> - 所在小组</h4>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="content-wrapper">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">分析员小组</h6>
            <div class="heading-elements">
                <a href="{{route('teams.create')}}" class="btn bg-teal-400 btn-sm btn-labeled btn-labeled-right heading-btn">创建小组<b><i class="icon-pencil5"></i></b></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-xlg text-nowrap">
                <thead>
                <tr>
                    <th>小组名称</th>
                    <th>组内角色</th>
                    <th>更改状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{$team->name}}</td>
                        <td>
                            @if(auth()->user()->isOwnerOfTeam($team))
                                <span class="label label-success">组长</span>
                            @else
                                <span class="label label-primary">组员</span>
                            @endif
                        </td>
                        <td>
                            @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                <a href="{{route('teams.switch', $team)}}" class="btn btn-flat">
                                    <i class="icon-switch2 text-danger"></i>
                                </a>
                            @else
                                <span class="label label-primary">活跃中</span>
                            @endif

                        </td>
                        <td>
                            <a href="{{route('teams.members.show', $team)}}" class="btn btn-flat">
                                <i class="icon-users4 text-info"></i>
                            </a>

                            @if(auth()->user()->isOwnerOfTeam($team))

                                <a href="{{route('teams.edit', $team)}}" class="btn btn-flat">
                                    <i class="icon-pencil5 text-default"></i>
                                </a>

                                <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-flat"><i class="icon-trash"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            </div>
    </div>
    </div>

@endsection
