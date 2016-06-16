@extends('layouts.default')


@section('content')
@if ($errors->has('email'))
                <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $errors->first('email') }}</span>
                @endif
    <section id="secure">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>完善的分析服务</h1>
                </div>
                <div class="col-md-8">
                    <p>医学科研数据的分析与统计，包括基础和高级统计分析，数据挖掘，统计图形等。比如T检验，方差分析，秩合分析，卡方检验，meta分析，相关分析，回归分析等。团队成员都承担和参与大型项目的数据统计与分析工作，平台力争覆盖所有高校统计学分析员，为你提供一站式服务
                   </p>
                </div>
            </div>
        </div>
    </section>

    <section id="feature">
        <div class="container">
            <div class="row title">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1>我们所能做的</h1>
                    <p>假如你的研究中出现了以下的问题，那么可以尝试一下我们的帮助，或许能够在科研上助你一臂之力</p>
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-7">
                    <h2 class="feature-heading">研究过程总是遇挫 <span class="text-muted">总是问题不断</span></h2>
                    <p class="lead">统计分析也能够应用到项目设计和开展的各个过程，我们或许能够帮你及时找出出现的问题，及时修正数据的不足</p>
                </div>
                <div class="col-md-5">
                    <img class="feature-image img-responsive center-block" src="/images/fea-1.png" alt="">
                </div>
            </div>

            <hr class="feature-divider">

            <div class="row feature">
                <div class="col-md-7 col-md-push-5">
                    <h2 class="feature-heading">科研过程总是千头万绪 <span class="text-muted">把握不准方向</span></h2>
                    <p class="lead">统计分析能够借助假设验证，及时排除错误定论，甚至能够为下一步指明可能方向或发现之前忽视的可能性</p>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <img class="feature-image img-responsive center-block" src="/images/fea-2.png" alt="">
                </div>
            </div>
            <hr class="feature-divider">

            <div class="row feature">
                <div class="col-md-7">
                    <h2 class="feature-heading">高水平研究总是差之毫厘 <span class="text-muted">需要进行结果完善</span></h2>
                    <p class="lead">定制化的分析模式，使得结果和数据完美的结合，不同的分析方式可能会产生迥异的结论</p>
                </div>
                <div class="col-md-5">
                    <img class="feature-image img-responsive center-block" src="/images/fea-3.png" alt="">
                </div>
            </div>

            <hr class="feature-divider">

            <div class="row feature">
                <div class="col-md-7 col-md-push-5">
                    <h2 class="feature-heading">墨守陈规总显得封闭陈旧<span class="text-muted">想用新方式加速研究</span></h2>
                    <p class="lead">7x24小时服务，第一时间验证你所想，拿到你所需</p>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <img class="feature-image img-responsive center-block" src="/images/fea-4.png" alt="">
                </div>
            </div>
        </div>
    </section> 

    <section id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1>分析团队</h1>
                <p>团队虽小，人才俱全! 同时，也期待您的加入！有意者可以<a href="mailto:hr@scistats.com"><i class="fa fa-envelope" style="margin-left:10px;"></i>发邮件给我们</a></p>
            </div>
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(/images/team/team-mem11.png);"><p class="name">张凯歌<span class="role">Leader</span></p></div>
            <div class="swiper-slide" style="background-image:url(/images/team/team-mem22.png)"><p class="name">徐浩<span class="role">Analyzer</span></p></div>
            <div class="swiper-slide" style="background-image:url(/images/team/team-mem33.png)"><p class="name">陈楠<span class="role">Analyzer</span></p></div>
            <div class="swiper-slide" style="background-image:url(/images/team/team-mem44.png)"><p class="name">陈修闯<span class="role">Analyzer</span></p></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
            
        

    </section>
    
    <section id="footer">
        <div class="container">
             <footer>
                <span>© Origeno 成都元因科技 保留一些权利</span> <span class="pull-right">
                <!-- <a href="/privacy">隐私保护</a> · <a href="/terms">使用条款</a> -->
                </span>
            </footer>
        </div>
       
    </section>
    
@stop

@section('script')
<script type="text/javascript" src="/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        freeMode: true
    });
</script>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259582980'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1259582980%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>

@stop