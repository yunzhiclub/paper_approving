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

    <form class="form-horizontal" <?php if((ACTION_NAME) == "add"): ?>action = "<?php echo U('save');?>" <?php else: ?> action = "<?php echo U('update');?>"<?php endif; ?> method = 'post'>
      <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>"></input>


      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">用户名：</label>
        <div class="col-sm-4">
          <input id="username" name="username" class="form-control" <?php if(($user['name']) == ""): else: ?>disabled="disabled"<?php endif; ?> value="<?php echo ($user["username"]); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名：</label>
        <div class="col-sm-4">
          <input id="name" name = "name" class="form-control" <?php if(($user['name']) == ""): else: ?>disabled="disabled"<?php endif; ?> value="<?php echo ($user["name"]); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="phonenumber" class="col-sm-2 control-label">手机号：</label>
        <div class="col-sm-4">
          <input id="phonenumber" name="phonenumber" class="form-control" value="<?php echo ($user["phonenumber"]); ?>">
        </div>
      </div>

      <div class="form-group">
	      <label for="email" class="col-sm-2 control-label">邮箱：</label>
        <div class="col-sm-4">
          <input id="email" name="email" class="form-control" value="<?php echo ($user["email"]); ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
      <button type = "submit" class="btn btn-sm btn-success">
      <i class="fa fa-check"></i>保存</button>
        </div>
      </div>
    </form>
        </div>
      </div> 
    </div>
  </div>
 


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