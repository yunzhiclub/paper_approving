<extend name="Base:index" />
<block name="body">
    <div class="row">
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
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>批量生成用户名和密码</a>
                </div>
                <div class="col-md-2">
                    <html:uploader value="value" filetypeexts="*.pdf;*.doc;*.docx" name="filetest" debug="false" type="file" callback="callBack">
                            请选择附件
                    </html:uploader>
                </div>
            </div>
            <div class="panel-body">
                    </div>
            <div class="row">
                <div class="col-md-3">
                    <select class="selectpicker form-control" name="show">
                        <option>全部</option>
                                        <option>未匹配成功</option>
                                        <option>已评阅完成</option>
                                        <option>未评阅完成</option>
                                    </select>
                </div>
                <div class="col-md-3">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>批量下载评阅表</a>
                </div>
                <div class="col-md-2">
                    <a class="button btn btn-info"  href="#" ><i class="glyphicon glyphicon-plus"></i>批量下载评阅统计表</a>
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
		                    </tr>
	                    </thead>
                        <tbody>
                            <foreach name="papers" item="paper" key="k">
                                <tr>
                                    <td>{$k+1}</td>
                                    <td><a href="{:U('detail?id=' . $student['id'])}">{$paper['student_no']}</a></td>
                                    <td>{$paper['name']}</td>
                                    <td>
                                        {$paper['title']}
                                        <?php 
                                            if ($paper['savepath'] !== null) :
                                        ?>
                                                <a target="_blank" href="__UPLOADS__/{$paper["savepath"]}{$paper["savename"]}">点击下载</a> 
                                        <?php
                                            endif;
                                        ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
    <include file="index.js" />
</block>
