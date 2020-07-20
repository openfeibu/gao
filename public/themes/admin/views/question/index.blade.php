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
                        <input class="layui-input search_key" name="content" id="demoReload" placeholder="内容" autocomplete="off">
                    </div>

                    <div class="layui-inline">
                        <input class="layui-input search_key" name="game_user_id" id="demoReload" placeholder="玩家ID" autocomplete="off">
                    </div>
                    <div class="layui-inline">
                        <input class="layui-input search_key" name="order_sn" id="demoReload" placeholder="单号ID" autocomplete="off">
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
<script type="text/html" id="activeTpl">
    <input type="checkbox" name="active" value="1" lay-skin="switch" lay-text="处理|未处理" lay-filter="active" @{{ d.active == 1 ? 'checked' : '' }}>
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
                ,{field:'game_user_id',title:'跟进渠道',edit:'text', width:120}
                ,{field:'order_sn',title:'玩家联系方式',edit:'text',width:120}
                ,{field:'content',title:'工单号/问题',edit:'text',width:120}
                ,{field:'huifu',title:'交接人',edit:'text',width:120}
                ,{field:'qufu',title:'备注/说明',edit:'text',width:500}
                ,{field:'active',title:'是否处理',width:120,templet:'#activeTpl'}
                ,{field:'created_at',title:'创建时间', width:200}
              //  ,{field:'updated_at',title:'更新时间', width:200}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,cellMinWidth:200
            ,height: 'full-200'
        });
//监听在职操作
        form.on('switch(active)', function(obj){
            var data = $(obj.elem);
            var id = data.parents('tr').first().find('td').eq(1).text();
            var ajax_data = {};
            ajax_data['_token'] = "{!! csrf_token() !!}";
            ajax_data['active'] = obj.elem.checked == true ? 1 : 0;
            var load = layer.load();
            $.ajax({
                url : main_url+'/'+id,
                data : ajax_data,
                type : 'PUT',
                success : function (data) {
                    layer.close(load);
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    $.ajax_error(jqXHR, textStatus, errorThrown);
                }
            });
        });

    });
</script>
{!! Theme::partial('common_handle_js') !!}