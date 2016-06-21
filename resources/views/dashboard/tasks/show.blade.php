@extends('layouts.dashboard')

@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">查看需求</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">需求</span> - 查看需求</h4>
            </div>
        </div>
    </div>
@stop
@section('content')
    <!-- Task overview -->
    <div class="panel panel-flat">
        <div class="panel-heading mt-5">
            <h5 class="panel-title">#{{ $task->id }}</h5>
            <div class="heading-elements">
                <span class="heading-text position-left">期限： <span class="text-bold text-danger-600">{{ $task->time }}</span></span>
                <span class="heading-text position-left">预算： <span class="text-bold text-danger-600">${{ $task->pay }}</span></span>

                @if($task->closed)
                    <span class="btn bg-grey-400 btn-sm btn-labeled btn-labeled-right heading-btn">需求关闭 <b><i class="icon-cancel-circle2"></i></b></span>
                @elseif($task->completed)
                    <span class="btn bg-success-400 btn-sm btn-labeled btn-labeled-right heading-btn">需求完成 <b><i class="icon-minus-circle2"></i></b></span>
                @elseif($task->claimed)
                    <span class="btn bg-grey-400 btn-sm btn-labeled btn-labeled-right heading-btn">已被认领 <b><i class="icon-checkmark-circle"></i></b></span>
                @else
                    <span class="btn bg-success-400 btn-sm btn-labeled btn-labeled-right heading-btn">认领中<b><i class="icon-checkmark-circle"></i></b></span>
                @endif
            </div>
        </div>

        <div class="panel-body">
            <h6 class="text-semibold">简介</h6>
            <p class="content-group">
                @if($task->description)
                    {{ $task->description }}
                @else
                    没有提供数据介绍
                @endif
            </p>

            <h6 class="text-semibold">所需方法</h6>
            <p class="content-group-lg">
                @if(count($task->tags))
                    @foreach($task->tags as $tag)
                        <span class="badge bg-primary-400">{{ $tag->tag }}</span>
                    @endforeach
                @else
                    没有提供方法要求
                @endif
            </p>

            <h6 class="text-semibold">数据（右键另存为）</h6>
            <p class="content-group">
                @if($task->data_path)
                    <a href="{{ route('download.data', $task->data_path) }}" class="btn btn-sm bg-teal"><i class="icon-file-download">&nbsp;</i>{{ $task->data_ori_filename }}</a>
                @else
                    没有提供数据
                @endif
            </p>
            @role('admin|analyst|moderator')
            @include('partials.bids')
            @endrole

        </div>

        <div class="panel-footer">
            <div class="heading-elements">
                @if(!$task->completed && Auth::user()->id == $task->claimed_user_id)
                    {!! Form::open(['route' => ['dashboard.tasks.complete', $task->id], 'method' => 'patch', 'class' => ' display-inline-block']) !!}
                    <button type="submit" onclick="return confirm('确认完成？')" class="btn bg-teal-400 btn-sm btn-labeled btn-labeled-right heading-btn">分析完成
                        <b>
                            <i class="icon-checkmark-circle2"></i>
                        </b>
                    </button>
                    {!! Form::close() !!}
                @endif
                <ul class="list-inline list-inline-condensed heading-text pull-right">

                    @if( !$task->claimed && $task->user_id == Auth::user()->id || Auth::user()->is('admin'))
                        <li><a href="{{ route('dashboard.tasks.edit', $task->id) }}" class="btn btn-flat text-info">修改 <b><i class="icon-compose"></i></b></a></li>
                        @if(!$task->closed)
                            <li>
                                {!! Form::open(['route' => ['dashboard.tasks.close', $task->id], 'method' => 'patch']) !!}
                                <button type="submit" onclick="return confirm('确认废止？')" class="btn btn-flat text-warning-400">废止
                                    <b>
                                        <i class="icon-cross3"></i>
                                    </b>
                                </button>
                                {!! Form::close() !!}
                            </li>
                        @else
                            <li>
                                {!! Form::open(['route' => ['dashboard.tasks.close', $task->id], 'method' => 'patch']) !!}
                                <button type="submit" onclick="return confirm('确认恢复？')" class="btn btn-flat text-primary-400">恢复
                                    <b>
                                        <i class="icon-forward3"></i>
                                    </b>
                                </button>
                                {!! Form::close() !!}
                            </li>
                        @endif
                        <li>
                            {!! Form::open(['route' => ['dashboard.tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            <button type="submit" onclick="return confirm('确认删除？')" class="btn btn-flat text-danger">删除
                                <b>
                                    <i class="icon-trash"></i>
                                </b>
                            </button>
                            {!! Form::close() !!}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- /task overview -->
    @include('partials.comments')
@stop