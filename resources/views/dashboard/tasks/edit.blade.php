@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">修改需求</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">需求</span> - 修改需求</h4>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="content-wrapper">
        {!! Form::open(['route' => ['dashboard.tasks.update', $task->id], 'method' => 'put']) !!}
        {{ csrf_field() }}
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h5 class="panel-title">修改需求信息</h5>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <fieldset>
                            <legend class="text-semibold"><i class="icon-database">&nbsp;</i>数据信息：</legend>
                            <div class="form-group">
                                <label>方法标签：</label>
                                <select name="tags[]" class="select-multiple-tags" multiple="multiple">
                                    @if(count($task->tags))
                                        @foreach($task->tags as $tag)
                                            <option value="{{$tag->id}}" selected>{{ $tag->tag }}</option>
                                        @endforeach
                                    @endif
                                    <option value="AZ">Arizona</option>
                                </select>
                                <span class="help-block">你可以选择已有的方法，也可以通过"输入+回车"添加其他方法</span>
                            </div>

                            <div class="form-group">
                                <label>数据描述：</label>
                                <textarea name="description" rows="5" cols="5" class="form-control" placeholder="填写需求描述信息">{{$task->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>数据：</label>
                                <input name="data" type="file" class="file-styled"">
                                @if($task->data_ori_filename)
                                <p class="text-primary">已上传文件：{{ $task->data_ori_filename }}</p>
                                @endif
                                <span class="help-block">请打包压缩成一个文件后上传</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>期限：</label>
                                        <select name="due" data-placeholder="选择完成期限" class="select">
                                            @if($task->due)
                                                <option value="{{ $task->due }}" selected>{{ $task->time }}</option>
                                            @endif
                                            <option value="0"></option>
                                            <option value="1">三天之内</option>
                                            <option value="2">一周之内</option>
                                            <option value="3">两周之内</option>
                                            <option value="4">更久</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>预算：</label>
                                        <select name="budget" data-placeholder="选择预期花费" class="select">
                                            @if($task->budget)
                                            <option value="{{ $task->budget }}" selected>{{ $task->pay }}</option>
                                            @endif
                                            <option value="0"></option>
                                            <option value="1">100之内</option>
                                            <option value="2">500之内</option>
                                            <option value="3">1000之内</option>
                                            <option value="4">3000之内</option>
                                            <option value="5">更高</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="text-semibold"><i class="icon-user">&nbsp;</i>额外联系信息：</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>邮箱：</label>
                                        <input name="email" type="email" placeholder="test@test.com" class="form-control" value="{{ $task->email? $task->email : Auth::user()->email }}">
                                        <span class="help-block">填写可以接收信息和结果报告的邮箱</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>电话：</label>
                                        <input name="phone" type="text" placeholder="999-9999-9999" class="form-control" value="{{ $task->phone }}">
                                        <span class="help-block">如果想快速沟通，可提供</span>

                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-right">
                            <a href="{{ route('dashboard.tasks.show', $task->id) }}" class="btn btn-flat"><i class="icon-arrow-left12 position-right"></i>取消</a>
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
