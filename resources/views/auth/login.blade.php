@extends('layouts.auth')


@section('content')
	<!-- Advanced login -->
	<form role="form" method="POST" action="{{ url('/login') }}">
		{{ csrf_field() }}
		<div class="panel panel-body login-form">
			<div class="text-center">
				<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
				<h5 class="content-group">登陆你的账户</h5>
			</div>
			<div class="form-group has-feedback has-feedback-left">
				<input type="email" name="email" class="form-control" placeholder="邮箱地址" value="{{ old('email') }}">
				<div class="form-control-feedback">
					<i class="icon-envelop text-muted"></i>
				</div>
				@if ($errors->has('email'))
				<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $errors->first('email') }}</span>
				@endif
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="password" name="password" class="form-control" placeholder="密码">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
				@if ($errors->has('password'))
				<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $errors->first('password') }}</span>
				@endif
			</div>

			<div class="form-group login-options">
				<div class="row">
					<div class="col-sm-6">
						<label class="checkbox-inline">
							<input type="checkbox" class="styled" name="remeber">
							记住我
						</label>
					</div>

					<div class="col-sm-6 text-right">
						<a href="{{ url('/password/reset') }}">忘记密码？</a>
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn bg-blue btn-block">登陆<i class="icon-arrow-right14 position-right"></i></button>
			</div>

			<div class="content-divider text-muted form-group"><span>还没有账号？</span></div>
			<a href="{{ url('/register')}}" class="btn btn-default btn-block content-group">注册</a>
			<span class="help-block text-center no-margin">继续表示你已经阅读了我们的<a href="#">用户协议</a></a></span>
		</div>
	</form>
	<!-- /advanced login -->
@stop