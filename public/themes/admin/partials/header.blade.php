<div class="layui-header">
    <ul class="layui-nav layui-layout-right">
         <li class="layui-nav-item">

           <a href="https://baidu.com" target="_blank" class="layui-btn">facebook双儿</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://baidu.com" target="_blank" class="layui-btn">新建问题</a>

        </li>
        <!-- <li class="layui-nav-item">
           <a href="">个人中心<span class="layui-badge-dot"></span></a>
         </li> -->
        <li class="layui-nav-item" lay-unselect="">
            <a href="javascript:;"><img src="http://t.cn/RCzsdCq" class="layui-nav-img">{{ Auth::user()->email }}</a>
            <dl class="layui-nav-child">
                <dd><a href="{{ guard_url('password') }}">修改信息</a></dd>
                <dd><a href="{{ guard_url('logout') }}">退出</a></dd>
            </dl>
        </li>
    </ul>
</div>
