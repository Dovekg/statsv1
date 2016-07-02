<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-title h6">
                <span>主导航</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>

            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>链接</span> <i class="icon-menu" title="分析员面板"></i></li>
                    <li><a href="/dashboard"><i class="icon-home4"></i> <span>分析员面板</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>需求管理</span></a>
                        <ul>
                            <li><a href="/dashboard/tasks">所有需求</a></li>
                            <li><a href="/dashboard/tasks/claimed">已认领需求</a></li>
                            <li><a href="/dashboard/tasks/completed">已完成需求</a></li>
                        </ul>
                    </li>
                    <li><a href="/teams"><i class="icon-make-group"></i><span>团队和邀请</span></a></li>
                    <li><a href="/dashboard/methods"><i class="icon-design"></i><span>所有分析方法</span></a></li>
                    <li>
                        <a href="#"><i class="icon-list-unordered"></i> <span>个人资料</span></a>
                        <ul>
                            <li><a href="{{ route('profile.show') }}">个人资料</a></li>
                            <li><a href="{{ route('profile.change') }}">修改资料</a></li>
                        </ul>
                    </li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->