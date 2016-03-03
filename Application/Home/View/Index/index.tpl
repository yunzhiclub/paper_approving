<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>河北工业大学论文审批系统</title>
    <!-- Bootstrap Core CSS -->
    <link href="{:add_root_path("/SBAdmin2/css/bootstrap.min.css ")}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{:add_root_path("/SBAdmin2/css/metisMenu.min.css ")}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{:add_root_path("/SBAdmin2/css/sb-admin-2.css ")}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{:add_root_path("/SBAdmin2/css/font-awesome.min.css ")}" rel="stylesheet" type="text/css">
    <link href="{:add_root_path("/SBAdmin2/css/errorClass.css ")}" rel="stylesheet" type="text/css">
    <link href="{:add_root_path("/SBAdmin2/css/alertify.core.css ")}" rel="stylesheet" type="text/css">
    <link href="{:add_root_path("/SBAdmin2/css/alertify.default.css ")}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">请登录&nbsp;&nbsp;<span class="error">{:I('get.error')}</span></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="loginform" method="post" action="{:U('Login/login')}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="用户名" name="username" id="username" value="{:cookie('username')}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="password" id="password" type="password" value="{:cookie('password')}">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <php>$isRemember = cookie('remember');</php>
                                        <input type="checkbox" name="remember" <eq name="isRemember" value="on">checked="checked"</eq>>记住密码
                                    </label>
                                </div>
                                <eq name="isOpen" value="1">
                                    <button type="submit" class="btn btn-lg btn-success btn-block" id="login">登录</button>
                                    
                                </eq>
                                <p>系统开放时间:{$currentCycle["starttime"]}&nbsp;至&nbsp;{$currentCycle["endtime"]}</p>
                                <!-- Change this to a button or input when using this as a form -->
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
