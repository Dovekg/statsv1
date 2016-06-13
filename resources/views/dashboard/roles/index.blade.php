@extends('layouts.dashboard')


@section('page-header')
    <div class="page-header">
        <div class="breadcrumb-line">
            <div class="breadcrumb-boxed">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="icon-home2 position-left"></i> 主页</a></li>
                    <li><a href="/dashboard">管理面板</a></li>
                    <li class="active">所有角色</li>
                </ul>

            </div>
        </div>

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">角色</span> - 所有角色</h4>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">所有用户列表</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><span type="button" class="btn btn-flat bg-primary" data-toggle="modal" data-target="#modal_add_role"><i class="icon-coin-dollar"></i>新角色</span></li>
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
                        <th>层级</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>{{ $role->description }}</td>
                            <td>{{ $role->level }}</td>
                            <td>
                                <a href="{{route('dashboard.roles.edit', $role->id)}}" class="btn btn-flat"><i class="icon-pencil5 text-primary"></i></a>
                                {!! Form::open(['route' => ['dashboard.roles.destroy', $role->id], 'method' => 'delete']) !!}
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
    <div id="modal_add_role" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">新角色</h5>
                </div>

                {!! Form::open(['route' => ['dashboard.roles.store'], 'method' => 'post']) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>名称：</label>
                                        <input name="name" type="text"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Slug：</label>
                                        <input name="slug" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>层级：</label>
                                        <input name="level" type="number" class="form-control">
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