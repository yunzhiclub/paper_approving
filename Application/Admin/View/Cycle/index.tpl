<extend name="Base:index" />
<block name="body">
    <div class="row-fluid">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-3">
                    <a class="button btn btn-info"  href="{:U('add')}" ><i class="glyphicon glyphicon-plus"></i> 添加周期</a>
                </div>
            </div>
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="panel-body">
                    </div>

                    <table class = "table table-bordered table-striped table-hover">
	                    <thead>
	                        <tr>
                                <th>序号</th>
			                    <th>名称</th>
                                <th>开始日期</th>
                                <th>结束日期</th>
                                <th>当前日期</th>
			                    <th>操作</th>
		                    </tr>
	                    </thead>
	                    <tbody>
		                    <foreach name="cycles" item="cycle" key="k">
			                    <tr>
				                    <td>{$k+1}</td>
				                    <td>{$cycle['name']}</td>
                                    <td>{$cycle['starttime']}</td>
                                    <td>{$cycle['endtime']}</td>
                                    <td><eq name="cycle['is_current']" value="0"><span class="badge">否</span><else/>是</eq></td>
				                    <td>
				                    <a class="btn btn-sm btn-primary" href="{:U('edit?id='.$cycle['id'])}"><i class="fa fa-pencil"></i>&nbsp;编辑</a>
				                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$cycle['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
				                    <a class="btn btn-sm btn-warning delete" href="{:U('setCurrent?id='.$cycle['id'])}"><i class="fa fa-sun-o"></i>&nbsp;设置当前周期</a>
				                    </td>
                                </tr>
		                    </foreach>	
	                    </tbody>
                    </table>

                </div>
                <nav>
                    <Yunzhi:page />
                </nav>

            </div>
        </div>
    </div>

</block>
