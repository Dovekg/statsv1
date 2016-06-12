@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">个人信息</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">个人信息</span> - 更改</h4>
            </div>
        </div>
    </div>
@stop
@section('content')

    @include('partials.sidebar')
    <div class="content-wrapper">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h5 class="panel-title">修改个人资料</h5>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::open(['route' => ['profile.password', Auth::user()->id], 'method'=> 'patch', 'class' => 'form-horizontal']) !!}
                        <fieldset>
                            <legend class="text-semibold"><i class="icon-database">&nbsp;</i>更改密码：</legend>
                            <div class="form-group">
                                {!! Form::label('password', '新密码：', ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('confirm_password', '确认新密码：', ['control-label']) !!}
                                {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">修改密码<i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ['profile.username', Auth::user()->id], 'method'=> 'patch', 'class' => 'form-horizontal']) !!}
                        <fieldset>
                            <legend class="text-semibold"><i class="icon-user">&nbsp;</i>更改用户名：</legend>
                            <div class="form-group">
                                {!! Form::label('username', '新用户名：', ['class' => 'control-label']) !!}
                                {!! Form::text('username', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">修改用户名<i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /form centered -->
@stop