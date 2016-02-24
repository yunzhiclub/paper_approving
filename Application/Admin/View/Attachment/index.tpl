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
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i> 批量上传并匹配</a>
                </div>
                <div class="col-md-2">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i> 批量生成用户名和密码</a>
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
                                <th>密码1</th>
                                <th>用户名2</th>
                                <th>密码2</th>
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
                                <td>zhangsan</td>
                                <td>mengyunzhi</td>
                                <td>lisi</td>
                                <td>callme119</td>
                                <td><eq name="cycle['is_current']" value="1">否<else/><span class="badge">是</span></eq></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{:U('edit?id='.$Attachment['id'])}"><i class="fa fa-pencil"></i>&nbsp;单独下载评阅表</a>
                                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$Attachment['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
                                    <a class="btn btn-sm btn-warning delete" href="{:U('detail?id='.$Attachment['id'])}"><i class="fa fa-repeat"></i>&nbsp;编辑</a>
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
                                <td></td>
                                <td><eq name="cycle['is_current']" value="1">是<else/><span class="badge">否</span></eq></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{:U('edit?id='.$Attachment['id'])}"><i class="fa fa-pencil"></i>&nbsp;单独生成用户名密码</a>
                                    <a class="btn btn-sm btn-primary" href="{:U('edit?id='.$Attachment['id'])}"><i class="fa fa-pencil"></i>&nbsp;单独上传不匹配</a>
                                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$Attachment['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
                                    <a class="btn btn-sm btn-warning delete" href="{:U('detail?id='.$Attachment['id'])}"><i class="fa fa-repeat"></i>&nbsp;编辑</a>
                                    </td>
                            </tr>
                        </tbody>
<!-- 	                    <tbody>
		                    <foreach name="Attachments" item="Attachment" key="k">
			                    <tr>
				                    <td>{$k+1}</td>
                                    <td>{$Attachment['studentID']}</td>
				                    <td>{$Attachment['savename']}</td>
				                    <td>{$Attachment['type']}</td>
				                    <td>{$Attachment['savepath']}</td>
                                    <td>{$Attachment['create_time']}</td>
				                    <td>
				                    <a class="btn btn-sm btn-primary" href="{:U('edit?id='.$Attachment['id'])}"><i class="fa fa-pencil"></i>&nbsp;单独上传不匹配</a>
				                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$Attachment['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
				                    <a class="btn btn-sm btn-warning delete" href="{:U('detail?id='.$Attachment['id'])}"><i class="fa fa-repeat"></i>&nbsp;查看</a>
				                    </td>
                                </tr>
		                    </foreach>	
	                    </tbody> -->
                    </table>

                </div>
                <nav>
                    <Yunzhi:page />
                </nav>

            </div>
        </div>
    </div>

</block>
