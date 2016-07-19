@extends('layouts.app')

@section('style')
	<style type="text/css">
		.navbar {
			border-bottom: none;
		}
	</style>
	{{-- expr --}}
@stop
@section('content')
<section id="header">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-md-push-6">
				<div class="stats">
					<img class="stats-illustration" src="/images/stats.png" width="460">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-md-pull-6">
				<div class="headline">
					<h2 class="title">一站式分析平台</h2>
					<p class="lead" style="font-size: 20px;line-height: 1.8em;letter-spacing: 1px">Scistats吸纳了多行业，多层次的统计师，构建了一站式数据管理与分析平台，让你从此不再为数据的繁杂担心，真诚为您省时、省力，解放你的工作！</p>
				</div>
				<div class="head-btn" style="margin-top: -0.5em">
					<a href="/dashboard/tasks/create" class="btn btn-primary"><i class="fa fa-paper-plane-o">&nbsp;&nbsp;&nbsp;&nbsp;</i>提交分析需求</a>
				</div>
			</div>
		</div>
	</div>
	<div class="white-fade"></div>
</section>

<!-- STEPS PATH BLOCK -->
<section id="steps-path">
	<div class="container">
		<div class="sep-bottom text-center">
			<h2 class="title">统计分析如此方便</h2>
			<p class="desc-text">平台入驻了上百位统计师，随时随地为您服务，您可以放心无忧的提交您的需求，来看看你的数据都经历了那些过程</p>
		</div>
		
		<ul class="step-path-block">
			<li>
				<div class="step-img"><img src="/images/step1.png" class="screen" alt=""></div>
				<div class="step-text">
					<h3 class="title">需求提交</h3>
					<p>你只需要说明你的分析目的并把你的数据整理好并通过网站提交给我们</p>
				</div>
			</li>
			<li class="reverse">
				<div class="step-img"><img src="/images/step2.png" class="screen" alt=""></div>
				<div class="step-text">
					<h3 class="title">统计师抢单</h3>
					<p>需求一旦提交，统计师便可得到通知，随时随地方便的完成订单领取并安排好交付时间</p>
				</div>
			</li>
			<li>
				<div class="step-img"><img src="/images/step3.png" class="screen" alt=""></div>
				<div class="step-text">
					<h3 class="title">实时交流</h3>
					<p>在分析过程中，你可以通过平台方便及时的了解到分析进度，并与统计师交流分析过程出现的问题</p>
				</div>
			</li>
			<li class="reverse">
				<div class="step-img"><img src="/images/step4.png" class="screen" alt=""></div>
				<div class="step-text">
					<h3 class="title">结果交付</h3>
					<p>一旦统计师完成分析并经过质量校验后，平台便会通知你完成付款并接收报告，在你对结果满意后，劳动报酬便会支付给统计师</p>
				</div>
			</li>
		</ul>
		
	</div>
</section>

@stop