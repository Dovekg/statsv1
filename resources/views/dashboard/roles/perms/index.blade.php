@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">所有权限</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">权限</span> - 所有权限</h4>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">所有权限列表</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><span type="button" class="btn btn-flat bg-primary" data-toggle="modal" data-target="#modal_add_perm"><i class="icon-coin-dollar"></i>新权限</span></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>名称</th>
                        <th>标注</th>
                        <th>描述</th>
                        <th>模型</th>
                        <th>所属角色</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($perms as $perm)
                        <tr>
                            <td>{{ $perm->id }}</td>
                            <td>{{ $perm->name }}</td>
                            <td>{{ $perm->slug }}</td>
                            <td>{{ $perm->description }}</td>
                            <td>{{ $perm->model }}</td>
                            <td>
                                @foreach($perm->roles as $role )
                                    {{ $role->name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('dashboard.perms.edit', $perm->id)}}" class="btn btn-flat"><i class="icon-pencil5 text-primary"></i></a>
                                {!! Form::open(['route' => ['dashboard.perms.destroy', $perm->id], 'method' => 'delete']) !!}
                                <button type="submit" onclick="return confirm('确认删除？')" class="btn btn-flat text-danger">
                                        <i class="icon-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="modal_add_perm" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">新权限</h5>
                </div>

                {!! Form::open(['route' => ['dashboard.perms.store'], 'method' => 'post']) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>名称：</label>
                                        <input name="name" type="text"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug：</label>
                                        <input name="slug" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>所属角色：</label>
                                        <select name="role" data-placeholder="选择所属角色" class="select">
                                            <option value=""></option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>模型：</label>
                                        <input name="model" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>描述：</label>
                                <textarea name="description" type="text" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop