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
    <div class="content-wrapper">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h5 class="panel-title">个人资料</h5>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <ul class="media-list content-group-lg stack-media-on-mobile">
                            <li class="media">
                                <div class="media-left">
                                    <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="{{ route('profile.show') }}" class="text-semibold text-size-large">{{ Auth::user()->name }}</a>
                                        <span class="media-annotation dotted">{{ Auth::user()->email }}</span>
                                        <span><a href="{{ route('profile.change') }}" class="text-info pl-10"><i class="icon-compose"></i></a></span>
                                    </div>

                                    <p>注册于：<span class="media-annotation">{{ Auth::user()->created_at }}</span></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /form centered -->
@stop