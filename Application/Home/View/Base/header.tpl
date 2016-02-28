<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">河北工业大学论文盲审系统</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://127.0.0.1/paper_approving/Public/index.php/Home/Expert/index.html"><i class="fa fa-user fa-fw"></i>安强 欢迎您</a></li>
                <li class="dropdown">
                    <a href="{:U('Login/logout')}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">注销</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{:U('Home/index')}">首页</a>
                </li>
                <li>
                    <a href="{:U('Expert/index')}">个人信息</a>
                </li>
                <php>$expert = session('expert');</php>
                <eq name="expert['is_normal']" value="1">
                  <li>
                      <a href="{:U('Reviews/index')}">查阅评分标准</a>
                  </li>
                  <li>
                      <a href="{:U('ReviewDetail/index')}">评阅论文</a>
                  </li>
                </eq>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
