<extend name="Base:index" />
<block name="body">
    <div class="row-fluid">
        <div class="col-xs-12">
        <div class="row">
        </div>
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
                <div class="col-md-3">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i> 批量上传并匹配</a>
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
			                    <th>附件名</th>
                                <th>附件类型</th>
                                <th>上级目录</th>
                                <th>上传时间</th>
			                    <th>操作</th>
		                    </tr>
	                    </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>108563</td>
                                <td>某某论文</td>
                                <td>..</td>
                                <td>5班</td>
                                <td>2016.2.3</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{:U('edit?id='.$Attachment['id'])}"><i class="fa fa-pencil"></i>&nbsp;单独上传不匹配</a>
                                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$Attachment['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
                                    <a class="btn btn-sm btn-warning delete" href="{:U('detail?id='.$Attachment['id'])}"><i class="fa fa-repeat"></i>&nbsp;查看</a>
                                    </td>
                            </tr>
                        </tbody>
	                    <!-- <tbody>
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
	                    </tbody>
                    </table>
 -->
                </div>
                <nav>
                    <Yunzhi:page />
                </nav>

            </div>
        </div>
    </div>

</block>
