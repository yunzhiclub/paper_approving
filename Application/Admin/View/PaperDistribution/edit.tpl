<extend name="Base:index" />
<block name="body">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    论文分配设置
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{:U('save',I('get.'))}" method='post' id="demoForm">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">分配的账户数目:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="value" value="{$value}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check "></i>确认添加</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <include file="addjs" />
    </div>
</block>
