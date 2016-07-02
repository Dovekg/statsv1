@extends('layouts.app')
@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">创建自己的团队</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">团队</span> - 创建自己的团队</h4>
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
                                <h5 class="panel-title">创建自己的新团队</h5>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                        <form method="post" action="{{route('teams.store')}}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label">名称：</label>

                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">提交<i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </form>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
@endsection
