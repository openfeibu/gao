<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>单详情</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('wzdq/'.$wzdq->id)}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">网址昵称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="wznc" lay-verify="title" autocomplete="off" placeholder="" class="layui-input" value="{{ $wzdq->game_user_id }}">

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">网址</label>
                        <div class="layui-input-inline">
                                   <input type="text" name="wz" lay-verify="title" autocomplete="off" placeholder="" class="layui-input"  value="{{ $wzdq->order_sn }}">
                        </div>
                    </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
</script>