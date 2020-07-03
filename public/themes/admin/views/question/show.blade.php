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
                <form class="layui-form" action="{{guard_url('question/'.$question->id)}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">内容 *</label>
                        <div class="layui-input-block">
                            {!! $question->content !!}
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
