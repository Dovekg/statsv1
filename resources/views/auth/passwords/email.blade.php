@extends('layouts.auth')
@section('content')
<!-- Password recovery -->
	<form role="form" method="POST" action="{{ url('/password/email') }}">
	{{ csrf_field() }}
		<div class="panel panel-body login-form">

		@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif
			<div class="text-center">
				<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
				<h5 class="content-group">密码找回 <small class="display-block">我们会通过邮件发送给你指导</small></h5>
			</div>

			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" placeholder="你的邮箱地址" value="{{ old('email') }}">
				<div class="form-control-feedback">
					<i class="icon-mail5 text-muted"></i>
				</div>
				@if ($errors->has('email'))
				<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('email') }}</span>
				@endif
			</div>

			<button type="submit" class="btn bg-blue btn-block">发送重置密码链接 <i class="icon-arrow-right14 position-right"></i></button>
		</div>
	</form>
	<!-- /password recovery -->
@stop