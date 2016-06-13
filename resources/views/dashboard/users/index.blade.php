@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">所有用户</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">用户</span> - 所有用户</h4>
            </div>
        </div>
    </div>
@stop

@section('content')
    <!-- Collapsible lists -->

    <!-- Collapsible list -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">所有用户列表</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <ul class="media-list media-list-linked">
            @foreach($users as $user)
            <li class="media">
                <div class="media-link cursor-pointer" data-toggle="collapse" data-target="#{{ $user->id . $user->name }}">
                    <div class="media-left"><img src="{{ $user->avatar }}" class="img-circle" alt=""></div>
                    <div class="media-body">
                        <div class="media-heading text-semibold">{{ $user->name }}</div>
                        <span class="text-muted">
                            @if(count($user->roles))
                                @foreach($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            @endif
                        </span>
                    </div>
                    <div class="media-right media-middle text-nowrap">
                        <i class="icon icon-stack display-block"></i>
                    </div>
                </div>

                <div class="collapse" id="{{ $user->id . $user->name }}">
                    <div class="contact-details">
                        <ul class="list-extended list-unstyled list-icons">

                            <li><i class="icon-pin position-left"></i> {{ $user->name }}</li>
                            <li><i class="icon-mail5 position-left"></i> <a href="#">{{ $user->email }}</a></li>
                            <li class="display-inline-block"><a href="{{route('dashboard.users.edit', $user->id)}}" class="btn btn-flat"><i class="icon-pencil5 text-primary"></i></a></li>
                            <li class="display-inline-block"><a href="{{route('dashboard.users.destroy', $user->id)}}" class="btn btn-flat"><i class="icon-cross2 text-danger-400"></i></a></li>
                        </ul>
                    </div>
                </div>
            </li>
                @endforeach




        </ul>
    </div>
    <!-- /collapsible list -->
@stop