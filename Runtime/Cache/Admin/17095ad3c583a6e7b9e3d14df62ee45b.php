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
        
    <form id="form" action="<?php echo U('save');?>" method="post">
        <script>$(function(){var ue = UE.getEditor("ueditor",{serverUrl :"/ethan-wechat/Public/yunzhi.php/Ueditor/index.html"});})</script><script id="ueditor" name="" style="" class="" type="text/plain"><H1>HEELO</H1></script>
    
      

        <input type="hidden" id="filetest" name="filetest" value="<?php echo $value; ?>" /><div class="uploader" id="filetest_img"><ul><?php if($value !== "" && isset($value)) : $lists = explode(",", $value); foreach($lists as $key =>$value) : ?><li><a href="<?php echo $value; ?>" target="_blank"><img src="<?php echo $value; ?>" class="img-rounded" /></a><button type="button" data-url="<?php echo $value; ?>" data-file="filetest" class="uploaderDelete btn btn-danger btn-xs"><i class="fa fa-times"></i></button></li><?php endforeach; endif;?></ul></div><div class="uploadify"><div id="queue"></div><input id="filetest_upload" name="filetest_upload" type="file" multiple="true"><div class="error"></div></div><script type="text/javascript">
                        $(function(){
                            uploader("/ethan-wechat/Public","filetest","btn btn-primary", "请选择图片");
                        }); 
                    </script>

        <button type="submit">submit</button>
    </form>

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