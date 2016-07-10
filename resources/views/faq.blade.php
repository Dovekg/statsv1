@extends('layouts.app')
@section('content')

<section id="more" class="bg-color3">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2>没有你遇到的问题？ </h2>
			</div>
            <div class="col-md-5 pull-right">
				<div class="marker-arrow-left"><a href="/contact" class="btn btn-lg btn-warning">联系我们</a></div>
			</div>
		</div>
	</div>
</section>

<section id="faq" class="bg-faq" style="background-image:url(images/bg52.jpg);">
	<div class="container">
		<div class="row no-dev">
			<div class="col-md-6" id="accordion-faq-1" role="tablist" aria-multiselectable="true">
				<div class="panel">
					<a class="panel-heading collapsed" data-toggle="collapse" role="button" data-parent="#accordion-faq-1" href="#collapseOne"><span class="editContent">暂未有任何问题</span></a>
					<div id="collapseOne" class="panel-collapse collapse">
						<div class="panel-body">问题收集中！</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</section>



@stop