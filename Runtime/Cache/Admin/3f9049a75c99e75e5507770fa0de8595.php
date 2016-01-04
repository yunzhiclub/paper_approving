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
        
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加房型
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo U('save',I('get.'));?>" method="post">
                        <input type="hidden" name="id" value="<?php echo ($room['id']); ?>" />
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>房型</label>
                                    <input class="form-control" id="title" name="title" type="text" value="<?php echo ($room['title']); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>价格</label>
                                    <input class="form-control" id="price" name="price" type="money" value="<?php echo (format_money($room['price'] )); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>描述</label>
                                    <input class="form-control" id="description" name="description" type="text" value="<?php echo ($room['description']); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>总间数</label>
                                    <input class="form-control" id="total_rooms" name="total_rooms" type="text" value="<?php echo ($room['total_rooms']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>房型介绍</label>
                                    <div>
                                        <script>$(function(){var ue = UE.getEditor("ueditor",{serverUrl :"/ethan-wechat/Public/yunzhi.php/Ueditor/index.html","textarea":"detial_description"});})</script><script id="ueditor" name="detial_description" style="" class="" type="text/plain"><?php echo (htmlspecialchars_decode($room['detial_description'] )); ?></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>房型图片</label>
                                        <input type="hidden" id="url" name="url" value="<?php echo $room['url']; ?>" /><div class="uploader" id="url_img"><ul><?php if($room['url'] !== "" && isset($room['url'])) : $lists = explode(",", $room['url']); foreach($lists as $key =>$value) : ?><li><a href="<?php echo $value; ?>" target="_blank"><img src="<?php echo $value; ?>" class="img-rounded" /></a><button type="button" data-url="<?php echo $value; ?>" data-file="url" class="uploaderDelete btn btn-danger btn-xs"><i class="fa fa-times"></i></button></li><?php endforeach; endif;?></ul></div><div class="uploadify"><div id="queue"></div><input id="url_upload" name="url_upload" type="file" multiple="true"><div class="error"></div></div><script type="text/javascript">
                        $(function(){
                            uploader("/ethan-wechat/Public","url","btn btn-primary", "请选择图片");
                        }); 
                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                            {__TOKEN__}
                                <button type="submit" class="btn btn-success "><i class="fa fa-check"></i> 确认</button>
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