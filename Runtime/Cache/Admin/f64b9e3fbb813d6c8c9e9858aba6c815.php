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
        
<div>
        <a class="button"  href="<?php echo U('add');?>" >添加</a>
    </div>
    <form action="<?php echo U('index');?>" method="get">
<table>
		<tr>
			<th>序号</th>
			<?php $order = I('get.order') ?>
			<th><a href="<?php if(($order) == "desc"): echo U('index?by=title&order=asc', I('get.'));?>  
			<?php else: ?> <?php echo U('index?by=title&order=desc', I('get.')); endif; ?>">标题</a></th>	
			<th>缩略图</th>
			<th><a href="<?php if(($order) == "desc"): echo U('index?by=weight&order=asc', I('get.'));?>  
			<?php else: ?> <?php echo U('index?by=weight&order=desc', I('get.')); endif; ?>">权重</a></th>	
			<th>状态</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($slideshows)): foreach($slideshows as $k=>$slideshow): ?><tr>
				<td><?php echo ($k+1); ?></td>
				<td><?php echo ($slideshow[title]); ?></td>
				<td><img class="suoluetu" src="<?php echo ($slideshow[url]); ?>" /></td>
				<td><?php echo ($slideshow[weight]); ?></td>
				<td><?php echo ($slideshow[status]?'正常':'冻结'); ?></td>
				<td></td>
				<td><a class="button" href="<?php echo U('detail?id='.$slideshow['id'].'&p='.I('get.p'));?>">查看</a>&nbsp;&nbsp;
				<a class="button" href="<?php echo U('edit?id='.$slideshow['id'].'&p='.I('get.p'));?>">编辑</a>&nbsp;&nbsp;
				<a class="button" href="<?php echo U('delete?id='.$slideshow['id'].'&p='.I('get.p'));?>">删除</a></td>
			</tr><?php endforeach; endif; ?>	
	</table>
	</form>
	<?php $page = new Think\Page(20,10);echo $page->show(); ?>
	<style type="text/css">
	.suoluetu{
		height: 50px;
	}
	</style>

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


    
    

    <!-- end: JavaScript-->


    
</body>

</html>