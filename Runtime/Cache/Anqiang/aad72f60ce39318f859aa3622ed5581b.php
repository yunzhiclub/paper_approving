<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html ng-app="yunzhiclub">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
  <title></title>

  <link href="/Ethan-wechat/Public/lib/ionic/css/ionic.css" rel="stylesheet">
  <link href="/Ethan-wechat/Public/css/style.css" rel="stylesheet">

    <!-- IF using Sass (run gulp sass first), then uncomment below and remove the CSS includes above
    <link href="css/ionic.app.css" rel="stylesheet">
  -->


  <!-- ionic/angularjs js -->
  <script src="/Ethan-wechat/Public/lib/ionic/js/ionic.bundle.js"></script>

  <!-- your app's js -->
  <script src="/Ethan-wechat/Public/js/app.js"></script>

</head>
<body ng-controller="MyCtrl">
<!-- <div class="word">
  <p class="large">点评成功！！</p>
  <p class="medium">获得积分&nbsp+5</p>
  <p class="small"><a>我的积分>></a></p>
</div> -->
<div class="scroll-content has-header">
<div class="row">
  <div class="col">
    <h1 class="word">点评成功</h1>
  </div>
</div>
<div class="row">
  <div class="col">
    <h3 class="word">获得积分+5</h4>
  </div>
</div>
<div class="row">
  <div class="col">
    <h4 class="word undl">我的积分>></h6>
  </div>
</div>
<div>

</div>
</div>
</body>
</html>