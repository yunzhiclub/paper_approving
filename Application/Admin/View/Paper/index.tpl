<extend name="Base:index" />
<block name="body">
    <form action="{:U('index?keywords=')}" method="get">
        <div class="box">
            <div class="box-body table-responsive">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <html:uploader value="value" filetypeexts="*.pdf;*.doc;*.docx" name="filetest" debug="false" type="file" callback="callBack">
                                    上传论文
                                </html:uploader>
                            </div>
                            <div class="col-md-9">
                                <a class="button btn btn-info" href="{:U('createUserName')}"><i class="glyphicon glyphicon-plus"></i>生成用户名</a> &nbsp;&nbsp;
                                <a target="_blank" class="button btn btn-info" href="{:U('exportUserName')}"><i class="glyphicon glyphicon-plus"></i>导出用户名</a>&nbsp;&nbsp;
                                <a target="_blank" class="button btn btn-info" href="{:U('review/downLoadZip')}"><i class="glyphicon glyphicon-plus"></i>批量下载评阅表</a>&nbsp;&nbsp;
                                <a class="button btn btn-info" href="{:U('review/downloadExcel')}" target="_blank"><i class="glyphicon glyphicon-plus"></i>下载评阅统计表</a>&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="type" class="form-control">
                                <php>$type = I('get.type');</php>
                                <option value="all">全部</option>
                                <option value="uploaded" <eq name="type" value="uploaded">selected="selected"</eq>>已上传论文</option>
                                <option value="toupload" <eq name="type" value="toupload">selected="selected"</eq>>未上传论文</option>
                                <option value="reviewed" <eq name="type" value="reviewed">selected="selected"</eq>>已评阅</option>
                                <option value="reviewing" <eq name="type" value="reviewing">selected="selected"</eq>>评阅中</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group custom-search-form">
                            <input class="form-control" name="keywords" placeholder="请输入学号" type="text" value="{:I('get.keywords')}" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button> 
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>序号</th>
                        <?php $order=I('get.order') ?>
                        <th>
                            <a href="<eq name='order' value=" desc "> {:U('index?by=studentID&order=asc', I('get.'))}  
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
                            <td><a href="{:U('detail?id=' . $paper['id'])}">{$paper['student_no']}</a></td>
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
                            <php>
                                $experts = $M->getExpertsByStudentId($paper['id']);
                            </php>
                            <foreach name="experts" item="expert">
                                <td>
                                    <a href="javascript:void(0);" data-trigger="focus" data-container="body" data-toggle="popover" data-title="密码" data-placement="right" data-content="{$expert['userpassword']}">{$expert['username']}</a>
                                </td>
                                <td>
                                    <eq name="expert['is_reviewed']" value="0">否
                                        <else /><span class="badge">是</span><a href="{:U('review/downLoadTable?expert_id=' . $expert['id'])}">下载</a></eq>
                                </td>
                            </foreach>
                        </tr>
                    </foreach>
                </tbody>
            </table>
        </div>
        <nav>
            <Yunzhi:page />
        </nav>
    </form>
    <include file="index.js" />
</block>
