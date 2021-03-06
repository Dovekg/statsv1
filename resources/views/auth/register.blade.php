@extends('layouts.auth')

@section('content')
	<!-- Advanced login -->
<form role="form" method="POST" action="{{ url('/register') }}">
{{ csrf_field() }}
	<div class="panel panel-body login-form">
		<div class="text-center">
			<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
			<h5 class="content-group">创建账户<small class="display-block">必须填写所有内容</small></h5>
		</div>

		<div class="content-divider text-muted form-group"><span>用户资料</span></div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="text" name="name" class="form-control" placeholder="用户名">
			<div class="form-control-feedback">
				<i class="icon-user-check text-muted"></i>
			</div>
			@if ($errors->has('name'))
			<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('name') }}</span>
			@endif
		</div>

		

		<div class="form-group has-feedback has-feedback-left">
			<input type="email" name="email" class="form-control" placeholder="邮箱地址">
			<div class="form-control-feedback">
				<i class="icon-mention text-muted"></i>
			</div>
			@if ($errors->has('email'))
			<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('email') }}</span>
			@endif
		</div>

		<div class="content-divider text-muted form-group"><span>密码</span></div>
		<div class="form-group has-feedback has-feedback-left">
			<input type="password" name="password" class="form-control" placeholder="密码">
			<div class="form-control-feedback">
				<i class="icon-user-lock text-muted"></i>
			</div>
			@if ($errors->has('password'))
			<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('password') }}</span>
			@endif
		</div>
		
		<div class="form-group has-feedback has-feedback-left">
			<input type="password" name="password_confirmation" class="form-control" placeholder="确认密码">
			<div class="form-control-feedback">
				<i class="icon-user-lock text-muted"></i>
			</div>
			@if ($errors->has('password_confirmation'))
			<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('password_confirmation') }}</span>
			@endif
		</div>


		<button type="submit" class="btn bg-teal btn-block btn-lg">注册 <i class="icon-circle-right2 position-right"></i></button>
	</div>
</form>
<!-- /advanced login -->
@stop