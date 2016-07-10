@extends('layouts.app')

@section('content')


    
		<!-- CONTACT HALF TEAM BLOCK -->
		<section id="contact">
			<div class="container">
				<div class="row">
                	<div class="col-md-5">
						<div class="form-container">
							<h2 class="title">给我们留言</h2>
							<form action="{{ route('messages.store')}}" role="form" id="contact_form" novalidate="novalidate">
							{{ csrf_field() }}
								<div class="form-group">
									<input type="text" class="form-control" id="contact_name" placeholder="姓名" name="name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="contact_email" placeholder="邮箱" name="email">
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="4" placeholder="你的留言或者问题" id="contact_message" name="message"></textarea>
								</div>
								<button type="submit" id="contact_submit" data-loading-text="•••" class="btn btn-lg btn-block btn-primary">确认提交</button>
							</form>
						</div>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<h2 class="title"><strong>服务人员</strong></h2>
						<p class="desc-text sep-bottom">你可以联系我们的专职服务人员进行咨询和技术交流</p>
							<div class="row sep-half-bottom">
								<div class="col-sm-3">
									<img src="/images/team/team-mem1.png" class="screen">
								</div>
								<div class="col-sm-9 contact-info">
									<h3 class="title">平台问题</h3>
									<p><i class="fa fa-user"></i>张凯歌</p>
									<p><i class="fa fa-phone"></i> 185 8392 2317</p>
                                    <p><i class="fa fa-envelope"></i> kaige@scistats.com</p>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<img src="/images/team/team-mem2.png" class="screen">
								</div>
								<div class="col-sm-9 contact-info">
									<h3 class="title">数据问题</h3>
									<p><i class="fa fa-user"></i>徐浩</p>
									<p><i class="fa fa-phone"></i> 139 8064 2036</p>
                                    <p><i class="fa fa-envelope"></i> xuhao@scistats.com</p>
								</div>
							</div>
					</div>
				</div>
			</div>
		</section>

		<!-- MODAL CONTACT WINDOWS-->
        <div class="modal fade" id="modalContactSuccess" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title"><i class="icon icon-envelope-open"></i>很好！<br>
                    你的信息已发送，我们会尽快回复！</h3>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalContactError" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title"><i class="icon icon-ban"></i>糟糕！<br>信息发送失败！!</h3>
                </div>
            </div>
        </div>
 
    
@stop

@section('script')
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/placeholders.jquery.min.js"></script>
<script>

		function runScript() {

			$('#contact_form').validate({
				onfocusout: false,
				onkeyup: false,
				rules: {
					name: "required",
					message: "required",
					email: {
						required: true,
						email: true
					}
				},
				errorPlacement: function (error, element) {
					error.insertAfter(element);
				},
				messages: {
					name: "您怎么称呼？",
					message: "您的信息或问题",
					email: {
						required: "你的联系邮箱？",
						email: "请输入一个合法的邮箱"
					}
				},

				highlight: function (element) {
					$(element)
							.text('').addClass('error')
				},

				success: function (element) {
					element
							.text('').addClass('valid')
				}
			});

			$('#contact_form').submit(function () {
				// submit the form
				if ($(this).valid()) {
					$('#contact_submit').button('loading');
					var action = $(this).attr('action');
					$.ajax({
						url: action,
						type: 'POST',
						data: {
							_token: $("input[name='_token']").val(),
							name: $('#contact_name').val(),
							email: $('#contact_email').val(),
							message: $('#contact_message').val()
						},
						success: function () {
							$("input[name='_token']").val('');
							$('#contact_name').val('');
							$('#contact_email').val('');
							$('#contact_message').val('');
							$('#contact_submit').button('reset');
							//Use modal popups to display messages
							$('#modalContactSuccess').modal('show');
							
						},
						error: function () {
							$('#contact_submit').button('reset');
							//Use modal popups to display messages
							$('#modalContactError').modal('show');
						}
					});
				} else {
					$('#contact_submit').button('reset')
				}
				return false;
			});
		}

		runScript();

		document.addEventListener('reload-script',function(){
			runScript();
		});
	</script>
	{{-- expr --}}
@stop