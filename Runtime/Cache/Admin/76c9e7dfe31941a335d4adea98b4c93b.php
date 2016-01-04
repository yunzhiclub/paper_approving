<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>梦云智--洛克酒店后台管理系统</title>
<!-- Bootstrap Core CSS -->
<link href="/ethan-wechat/Public/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="/ethan-wechat/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<!-- Timeline CSS -->
<link href="/ethan-wechat/Public/Admin/dist/css/timeline.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="/ethan-wechat/Public/Admin/dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="/ethan-wechat/Public/Admin/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="/ethan-wechat/Public/Admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--webuploader-->
<link href="/ethan-wechat/Public/lib/webuploader/css/webuploader.css" rel="stylesheet" />

<link href="/ethan-wechat/Public/css/style.css" rel="stylesheet" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- jQuery -->
<script src="/ethan-wechat/Public/Admin/bower_components/jquery/dist/jquery.min.js"></script>



</head>

<body>
    
        <div id="wrapper">
            <?php echo ($YZ_TEMPLATE_NAV); ?>
            
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        
    <div class="row-fluid">
        <div class="col-xs-12">
            <div class="box">
                
                <div class="box-body table-responsive">
                    <div class="panel-body">
                        <button type="button" class="btn btn-info" onclick="javascript:history.back(-1);">返回</button>
                    </div>
                    <form class="form-horizontal" action="<?php echo U('save',I('get.'));?>" method = 'post' id="demoForm">
                        <div style="display:none">
                            <input name="edit" value="<?php echo ($data["edit"]); ?>">
                            <input name="id" value="<?php echo ($data["id"]); ?>">
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="title" value="<?php echo ($data["title"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subhead" class="col-sm-2 control-label">副标题</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="subhead" name="subhead" value="<?php echo ($data["subhead"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parent_id" class="col-sm-2 control-label">上级菜单</label>
                            <div class="col-sm-4">
                            <select class="selectpicker form-control select2" name="parent_id">
                                <option value="0">根菜单</option>
                                <?php if(is_array($menuList)): foreach($menuList as $key=>$menu): ?><option value="<?php echo ($menu["id"]); ?>" <?php if($menu['id'] == $data['parent_id']): ?>selected="selected"<?php endif; ?> >
                                    <?php for($level = 0; $level < $menu['_level']; $level++) echo "|--"; ?>
                                    <?php echo ($menu["title"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-sm-2 control-label">小图标</label>
                            <div class="col-sm-4">
                            <input class="form-control" id="icon" name="icon" value="<?php echo ($data["icon"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="module" class="col-sm-2 control-label ">模块名</label>
                            <div class="col-sm-4">
                            <input class="form-control" name="module" value="<?php echo ($data["module"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="controller" class="col-sm-2 control-label ">控制器名</label>
                            <div class="col-sm-4">
                            <input class="form-control"  name="controller" value="<?php echo ($data["controller"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="action" class="col-sm-2 control-label">方法名</label>
                            <div class="col-sm-4">
                            <input class="form-control" name="action" value="<?php echo ($data["action"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="action" class="col-sm-2 control-label">参数</label>
                            <div class="col-sm-4">
                            <input class="form-control" name="parameter" value="<?php echo ($data["parameter"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-4">
                            <input class="form-control" id="order" name="order" value="<?php echo ($data["order"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-4">
                                <div class="col-md-6 form-group">
                                    <select class="selectpicker form-control">
                                        <option>启用</option>
                                        <option>禁用</option>
                                    </select><!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="show" class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-4">
                            <div class="col-md-6 form-group">
                                <select class="selectpicker form-control" name="show">
                                    <option value="1">是</option>
                                    <option value="0" <?php if(($data["show"]) == "0"): ?>selected="selected"<?php endif; ?>>否</option>
                                </select><!-- /.input group -->
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">是否开发模式</label>
                            <div class="col-sm-4">
                                <div class="col-md-6 form-group">
                                    <select class="selectpicker form-control" name="development">
                                        <option value="1">是</option>
                                        <option value="0" <?php if(($data["development"]) == "0"): ?>selected="selected"<?php endif; ?>>否</option>
                                    </select><!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="3" name="remarks" ><?php echo ($data["remark"]); ?></textarea>
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
    </div>   
    <?php echo ($js); ?> 

        <div style="clear:both;display:block;width:100%;height:0px"></div>
    </div>
    <!--/#page-wrapper-->


            <div id="footer" style="clear:both;display:block">
                
                    <p>
                        <span style="text-align:left;float:left">&copy;<?php echo date("Y"); ?> <a href="http://www.mengyunzhi.com" alt="www.mengyunzhi.club">梦云智</a></span>
                    </p>
                
            </div>
        </div>
        <!--/#wrapper-->
        
    <!-- start: JavaScript-->


    <!-- Bootstrap Core JavaScript -->
    <script src="/ethan-wechat/Public/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/ethan-wechat/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/ethan-wechat/Public/Admin/dist/js/sb-admin-2.js"></script>
    <!--webuploader-->
    <script type="text/javascript" src="/ethan-wechat/Public/lib/webuploader/webuploader.min.js"></script>
    <script type="text/javascript" src="/ethan-wechat/Public/yunzhi.php/Webuploader/config.html"></script>
    
    <!--ueditor-->
    <script type="text/javascript" src="/ethan-wechat/Public/lib/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/ethan-wechat/Public/lib/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/ethan-wechat/Public/lib/ueditor/lang/zh-cn/zh-cn.js"></script>

    <!--uploadify-->
    <script type="text/javascript" src="/ethan-wechat/Public/lib/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/ethan-wechat/Public/js/js.js"></script>

    
    

    <!-- end: JavaScript-->


    
</body>

</html>