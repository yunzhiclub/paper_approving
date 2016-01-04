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
                        <a class="button btn btn-info"  href="<?php echo U('add');?>" >添加用户</a>
                    </div>
<form action="<?php echo U('index');?>" method="get">
    <div class="panel-body">
		<input type="text" placeholder="search" name="keywords" value ="<?php echo I('get.keywords');?>">
		</input>
		<button id="search" type="submit">搜索</button>
    </div>
</form>

<table class = "table table-bordered table-striped table-hover">
	<thead>
		<tr>
            <th>序号</th>
            <?php $order = I('get.order') ?>
			<th><a href="<?php if(($order) == "desc"): echo U('index?by=username&order=asc', I('get.'));?>  
			<?php else: ?> <?php echo U('index?by=username&order=desc', I('get.')); endif; ?>">用户名</a></th>

			<th>姓名</th>
			<th>手机号</th>
            <th>邮箱</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($users)): foreach($users as $k=>$user): ?><tr>
				<td><?php echo ($k+1); ?></td>
                <td><?php echo ($user['username']); ?></td>
				<td><?php echo ($user['name']); ?></td>
				<td><?php echo ($user['phonenumber']); ?></td>
				<td><?php echo ($user['email']); ?></td>
				<td><a class="button btn-sm btn-success" href="<?php echo U('edit?id='.$user['id']);?>">编辑</a>&nbsp;&nbsp; 
				<a class="button btn-sm btn-success" href="<?php echo U('delete?id='.$user['id']);?>">删除</a></td>
            </tr><?php endforeach; endif; ?>	
	</tbody>
</table>

                </div>
                <nav>
                    <?php $page = new Think\Page(8,4);echo $page->show(); ?>
                </nav>

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