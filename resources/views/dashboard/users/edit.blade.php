@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">修改用户</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">用户</span> - 修改用户</h4>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="content-wrapper">
            {!! Form::open(['route' => ['dashboard.users.update', $user->id], 'method' => 'put']) !!}
            {{ csrf_field() }}
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h5 class="panel-title">修改用户信息</h5>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <fieldset>
                                <legend class="text-semibold"><i class="icon-database">&nbsp;</i>数据信息：</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>用户名：</label>
                                            <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>邮箱：</label>
                                            <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>密码：</label>
                                            <input name="password" type="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>确认密码：</label>
                                            <input name="confirm_password" type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>角色：</label>
                                    <select name="role" data-placeholder="选择用户角色" class="select">
                                        <option value=""></option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">提交<i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <!-- /form centered -->
@stop

@section('scripts')
    <!-- Theme JS files -->
    <!-- <script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script> -->
    <!-- <script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script> -->


    <!-- <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script> -->
    <!-- <script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script> -->

    <!-- <script type="text/javascript" src="/assets/js/pages/form_layouts.js"></script> -->
    <!-- <script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script> -->
    <!-- <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script> -->
    <!-- /theme JS files -->

@stop
