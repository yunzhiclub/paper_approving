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
<script src="/ethan-wechat/Public/js/angular.min.js"></script>



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
        
    <div class="row" ng-app="edit">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    出房
                </div>
                <div class="panel-body" ng-controller="edit">
                    <form ng-submit="processForm()" role="form" action="<?php echo U('save',I('get.'));?>" method="post">
                        <input type="hidden" name="id" value="<?php echo ($room['id']); ?>" />
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>请选择入住日期</label>
                                    <input ng-model="formData.begin_time" class="form-control date" id="total_rooms" name="begin_time" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>请选择离店日期</label>
                                    <input ng-model="formData.end_time" class="form-control date" id="total_rooms" name="end_time" type="text" value="<?php echo date('Y-m-d');?>" />
                                </div>

                                <div class="form-group">
                                    <label>房型</label>
                                    <select class="form-control" name="room_id" ng-model="room_id" ng-options="room.id as room.title for room in rooms" >
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>房型单价</label>
                                    <input type="hidden" ng-model="per_price" name="per_price"/>
                                    <p class="form-control-static">{{per_price}}</p>
                                </div>
                                <div class="form-group">
                                    <label>数量</label>
                                    <select ng-model="count" class="form-control" name="count" ng-options="value as value for (key, value) in counts">
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>实付金额(应付金额：{{total_pay}})</label>
                                    <input class="form-control" name="total_pay" value="{{total_pay}}" />
                                </div>
                                <div class="form-group">
                                    <label>客户姓名</label>
                                    <input ng-required="true" class="form-control" name="customer_name" />
                                </div>
                                <div class="form-group">
                                    <label>客户手机号</label>
                                    <input class="form-control" name="customer_phone" />
                                </div>
                                <div class="form-group">
                                    <label>备注：</label>
                                    <textarea class="form-control" id="description" name="remark"></textarea>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                {__TOKEN__}
                                <button ng-show="showSubmit" type="submit" class="btn btn-success none"><i class="fa fa-check"></i> 确认</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
	angular.module('edit',[]).controller("edit", function($scope, $http){
		var iniflag = 0;
		//初始化form数据
		$scope.formData = {
							begin_time:"<?php echo date("Y-m-d");?>",
							end_time:"<?php echo date("Y-m-d",time()+60*60*24);?>"
						};
		$scope.count 		= 0;
		$scope.counts 		= new Array();
		$scope.rooms  		= new Array();
		$scope.room_id 		= 0;
		$scope.days 		= 0;
		$scope.per_price 	= 0;
		$scope.showSubmit   = 0;

		var getCounts = function(index)
		{
			var counts = new Array();
			var i = 0;
			while(i < index)
			{
				counts.push(++i);
			}
			return counts;
		}
		//查询房间
		var query = function(){
			if(iniflag === 0)
				return;
			var beginTime = new Date($scope.formData.begin_time);
			var endTime = new Date($scope.formData.end_time)
			$scope.days = Math.abs(endTime - beginTime)/(60*60*24*1000);
			$http({
				method	:'POST',
				url 	:'/ethan-wechat/Public/admin.php/Room/getRemainderRoomsAjax.html',
				data 	: $.param($scope.formData),
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' },
			}).success(function(data){
				console.log(data);
				if(data.status == "success")
				{
					$scope.rooms = data.lists;
				}
			});
		};

		$scope.$watch("formData.begin_time", function(){
			query();
			iniflag++;
		});
		$scope.$watch("formData.end_time", function(){
			query();
		});

		$scope.test = function(){
			console.log($scope.per_price);
			console.log($scope.room_id);
			console.log($scope.days);
		}

		$scope.$watch("room_id",function(){
			for (var i = 0, len = $scope.rooms.length; i < len; i++) {
			 	if($scope.room_id === $scope.rooms[i].id)
			 	{
			 		$scope.per_price = fToy($scope.rooms[i].price);
			 		$scope.counts = getCounts($scope.rooms[i].count);
			 		$scope.total_pay = $scope.count * $scope.per_price;
			 		break;
			 	}
			}
		});

		$scope.$watch("count",function(){
			$scope.total_pay = $scope.count * $scope.per_price * $scope.days;
		});

		$scope.$watch("days",function(){
			$scope.total_pay = $scope.count * $scope.per_price * $scope.days;
		});

		$scope.$watch("total_pay",function(){
			if ($scope.total_pay > 0)
			{
				$scope.showSubmit = 1;
			}
			else
			{
				$scope.showSubmit = 0;
			}
		})
		
	});
</script>

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

    <!--datapickir-->
    <script type="text/javascript" src="/ethan-wechat/Public/Admin/bower_components/datatimepicker/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/ethan-wechat/Public/Admin/bower_components/datatimepicker/bootstrap-datetimepicker.zh-CN.js"></script>
    <link href="/ethan-wechat/Public/Admin/bower_components/datatimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    
    

    <!-- end: JavaScript-->


    
</body>

</html>