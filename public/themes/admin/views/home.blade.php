<div class="main">
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="layui-card">
                <!-- <div class="layui-card-header">待办事项</div> -->
                <div class="layui-card-body">

                    <div class="fb-carousel fb-backlog " lay-anim="" lay-indicator="inside" lay-arrow="none" >
                        <div carousel-item="">
                            <ul class="layui-row fb-clearfix ">
                                <li class="layui-col-xs3">
                                    @permission(home())
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>繁体收件箱</h3>
                                        <p><cite>66</cite></p>
                                    </a>
                                    @endpermission
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>简体收件箱</h3>
                                        <p><cite>12</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>后台</h3>
                                        <p><cite>99</cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>邮件</h3>
                                        <p><cite>20</cite></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>