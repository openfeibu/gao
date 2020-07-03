<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>海外未处理问题表管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn mb10">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('question/create')}}">添加海外未处理问题表</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>

                <div class="layui-block table-search mb10">

                    <div class="layui-inline">
                        <input class="layui-input search_key" name="content" id="demoReload" placeholder="" autocomplete="off">
                    </div>

                    <button class="layui-btn" type="button" data-type="reload">{{ trans('app.search') }}</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="@{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('question')}}";
    var delete_all_url = "{{guard_url('question/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'game_user_id',title:'玩家',edit:'text'}
                ,{field:'order_sn',title:'单号',edit:'text'}
                ,{field:'content',title:'内容'}
                ,{field:'created_at',title:'创建时间', width:200}
                ,{field:'updated_at',title:'更新时间', width:200}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,height: 'full-200'
        });


    });
</script>
{!! Theme::partial('common_handle_js') !!}