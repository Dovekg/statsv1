@extends('layouts.dashboard')


@section('page-header')
	<div class="page-header">
		<div class="breadcrumb-line">
			<div class="breadcrumb-boxed">
				<ul class="breadcrumb">
					<li><a href="/"><i class="icon-home2 position-left"></i>主页</a></li>
					<li class="active">管理面板</li>
				</ul>

			</div>
		</div>

		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">管理面板</span></h4>
			</div>
		</div>
	</div>
@stop
@section('content')
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Support tickets -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">所有项目</h6>
				@role('admin|analyst|moderator')
				<div class="heading-elements">
					<a href="{{ route('dashboard.tasks.index') }}" class="btn bg-teal-400 btn-sm btn-labeled btn-labeled-right heading-btn">查看所有需求<b><i class="icon-eye"></i></b></a>
				</div>
				@else
				<div class="heading-elements">
					<button type="button" id="create-button" class="btn bg-teal-400 btn-sm btn-labeled btn-labeled-right heading-btn" data-toggle="modal" data-target="#modal_create_task">创建新需求<b><i class="icon-pencil6"></i></b></button>
				</div>
				@include('partials.create_task_modal')
				@endrole
			</div>

			<div class="table-responsive">
				<table class="table table-xlg text-nowrap">
					<tbody>
					<tr>
						<td class="col-md-3">

							<div class="media-left">
								<div class="text-center">
									<h4 class="text-semibold no-margin">
										{{ $all }}
										<small class="display-block text-size-mini no-margin">项目总个数</small>
									</h4>

								</div>
							</div>
						</td>

						<td class="col-md-3">
							<div class="media-left media-middle">
								<a href="{{ route('dashboard.tasks.process') }}" class="btn border-info-400 text-info-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm"></i></a>
							</div>

							<div class="media-left">
								<h5 class="text-semibold no-margin">
									{{ $process }} <small class="display-block no-margin">进行中</small>
								</h5>
							</div>
						</td>

						<td class="col-md-3">
							<div class="media-left media-middle">
								<a href="{{ route('dashboard.tasks.completed') }}" class="btn border-success-400 text-success-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-checkmark3"></i></a>
							</div>

							<div class="media-left">
								<h5 class="text-semibold no-margin">
									{{ $completed }} <small class="display-block no-margin">已完成</small>
								</h5>
							</div>
						</td>

						<td class="col-md-3">
							<div class="media-left media-middle">
								<a href="{{ route('dashboard.tasks.closed') }}" class="btn border-danger-400 text-danger-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-cross2"></i></a>
							</div>

							<div class="media-left">
								<h5 class="text-semibold no-margin">
									{{ $closed }} <small class="display-block no-margin">已废止</small>
								</h5>
							</div>
						</td>

					</tr>
					</tbody>
				</table>
			</div>


		</div>
		<!-- /support tickets -->

	</div>
	<!-- /main content -->

@stop