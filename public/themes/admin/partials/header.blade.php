<div class="layui-header">
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">

            <a href="https://docs.qq.com/sheet/BVDbDP2SLGPO11V6HQ4WQGEj0DK4cH2wlOeR0?ADUIN=610104486&ADSESSION=1593656501&ADTAG=CLIENT.QQ.5749_.0&ADPUBNO=27027&jumpuin=610104486&tab=c936rg" target="_blank" class="layui-btn">班表</a>

        </li>
        <li class="layui-nav-item">

            <a href="http://ol.ckhdhk.com/ck?login" target="_blank" class="layui-btn">后台</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://www.facebook.com/JWGLYJT/inbox/?mailbox_id=1804776816505613&selected_item_id=1000028" target="_blank" class="layui-btn">facebook简体</a>

        </li>

         <li class="layui-nav-item">

           <a href="https://www.facebook.com/JWGLY/inbox/?mailbox_id=622546104602619&selected_item_id=100023228601849" target="_blank" class="layui-btn">facebook繁体</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://www.tracup.com/cloud/#/project/ea724c9b5ef300a4fd8d72dc675936d4/issues//" target="_blank" class="layui-btn">新建问题</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://play.google.com/apps/publish/?account=4945178595610309155#AppListPlace" target="_blank" class="layui-btn">谷歌评论</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://itunesconnect.apple.com/" target="_blank" class="layui-btn">IOS评论</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://forum.gamer.com.tw/B.php?bsn=32925&subbsn=0" target="_blank" class="layui-btn">叫我官老爷巴哈姆特</a>

        </li>
        <li class="layui-nav-item">

            <a href="http://www.gamebase.com.tw/forum/78518/thread" target="_blank" class="layui-btn">叫我官老爷游戏基地</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://www.facebook.com/pg/JWGLYJT/posts/?ref=page_internal" target="_blank" class="layui-btn">简体帖子</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://www.facebook.com/pg/JWGLY/posts/?ref=page_internal" target="_blank" class="layui-btn">繁体帖子</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://www.facebook.com/groups/1565570086809361/?source_id=1804776816505613" target="_blank" class="layui-btn">简体小组帖子</a>

        </li>
        <li class="layui-nav-item">

            <a href="https://www.facebook.com/groups/621504214720275/?source_id=622546104602619" target="_blank" class="layui-btn">繁体小组帖子</a>

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
