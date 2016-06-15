@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">修改分析方法</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">分析方法</span> - 修改分析方法</h4>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="content-wrapper">
        {!! Form::open(['route' => ['dashboard.methods.update', $method->id], 'method' => 'put']) !!}
        {{ csrf_field() }}
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h5 class="panel-title">修改分析方法信息</h5>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="modal-body">                      
                            <div class="form-group">
                                <label>名称：</label>
                                <input name="name" type="text"  class="form-control" value="{{ $method->name }}">
                            </div>
                            <div class="form-group">
                                <label>描述：</label>
                                <textarea name="description" type="text" rows="3" class="form-control">{{ $method->description }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link"><a href="{{ route('dashboard.methods.index')}}">关闭</a></button>
                            <button type="submit" class="btn btn-primary">提交</button>
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
