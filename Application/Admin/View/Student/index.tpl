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
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i> 批量上传学生</a>
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
			                    <a href="<eq name='order' value="desc"> {:U('index?by=student_no&order=asc', I('get.'))}  
			                    <else/> {:U('index?by=student_no&order=desc', I('get.'))} </eq>">学号</a>
			                    </th>
			                    <th>姓名</th>
                                <th>论文题目</th>
                                <th>研究方向</th>
			                    <th>操作</th>
		                    </tr>
	                    </thead>
	                    <tbody>
		                    <foreach name="students" item="student" key="k">
			                    <tr>
				                    <td>{$k+1}</td>
                                    <td>{$student['student_no']}</td>
				                    <td>{$student['name']}</td>
                                    <td>{$student['title']}</td>
                                    <td>{$student['research_direction']}</td>
				                    <td>
				                    <a class="btn btn-sm btn-danger" href="{:U('delete?id='.$student['id'])}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
				                    <a class="btn btn-sm btn-warning delete" href="{:U('detail?id='.$student['id'])}"><i class="fa fa-repeat"></i>&nbsp;查看</a>
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
