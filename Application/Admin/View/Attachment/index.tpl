<extend name="Base:index" />
<block name="body">
    <div class="row-fluid">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-3">
                    <form action="{:U('index?keywords=')}" method="get">
                        <div class="input-group custom-search-form">
                            <input class="form-control" name="keywords" placeholder="Search..." type="text" value="{:I('get.keywords')}" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button> 
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>批量下载评阅表</a>
                </div>
                <div class="col-md-2">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>下载评阅统计表</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <select class="selectpicker form-control" name="show">
                                        <option>未匹配成功</option>
                                        <option>已评阅完成</option>
                                        <option>未评阅完成</option>
                                    </select>
                </div>
                <div class="col-md-2">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>批量下载评阅表</a>
                </div>
                <div class="col-md-2">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>下载评阅统计表</a>
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
                                <?php $order=I('get.order') ?>
			                    <th>
			                    <a href="<eq name='order' value="desc"> {:U('index?by=studentID&order=asc', I('get.'))}  
			                    <else/> {:U('index?by=studentID&order=desc', I('get.'))} </eq>">学号</a>
			                    </th>
			                    <th>学生姓名</th>
                                <th>论文名称</th>
                                <th>用户名1</th>
                                <th>是否评阅</th>
                                <th>用户名2</th>
                                <th>是否评阅</th>
			                    <th>操作</th>
		                    </tr>
	                    </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>111111</td>
                                <td>张三</td>
                                <td>微型框架的研究与设计</td>
                                <td>ksdfji</td>
                                <td><eq name="cycle['is_current']" value="1">否<else/><span class="badge">是</span></eq></td>
                                <td>dkfgvt</td>
                                <td><eq name="cycle['is_current']" value="1">否<else/><span class="badge">否</span></eq></td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$Attachment['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>132839</td>
                                <td>安强</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><eq name="cycle['is_current']" value="1">是<else/><span class="badge">否</span></eq></td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$Attachment['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
                                    </td>
                            </tr>
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
