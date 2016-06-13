@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">所有需求</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">需求</span> - 所有需求</h4>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="content-wrapper">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">所有需求</h6>
            </div>

            <div class="panel-body">
                <div class="content-group-xs" id="bullets"></div>

                <ul class="media-list">
                    @if(count($tasks))
                        @foreach($tasks as $task)
                            <li class="media">
                                <div class="media-left">
                                    @if($task->closed)
                                        <a href="{{ route('dashboard.tasks.show', $task->id)  }}" class="btn border-danger text-danger btn-flat btn-rounded btn-icon btn-xs"><i class="icon-cross2"></i></a>
                                    @elseif($task->completed)
                                        <a href="{{ route('dashboard.tasks.show', $task->id)  }}" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-xs"><i class="icon-checkmark3"></i></a>
                                    @elseif($task->claimed)
                                        <a href="{{ route('dashboard.tasks.show', $task->id)  }}" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-xs"><i class="icon-user-check"></i></a>
                                    @else
                                        <a href="{{ route('dashboard.tasks.show', $task->id)  }}" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-xs"><i class="icon-alarm"></i></a>
                                    @endif
                                </div>

                                <div class="media-body">
                                    {{ str_limit($task->description, 100) }}
                                    <div class="media-annotation">{{ $task->created_at }}</div>
                                </div>

                                <div class="media-right media-middle">
                                    <ul class="icons-list">
                                        <li>
                                            <a href="{{ route('dashboard.tasks.show', $task->id)  }}"><i class="icon-arrow-right13"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="media">
                            <div class="media-body">
                                没有任何需求可供展示
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@stop