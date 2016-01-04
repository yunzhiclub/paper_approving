<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html ng-app="yunzhiclub">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

  <link href="/ethan-wechat/Public/lib/ionic/css/ionic.css" rel="stylesheet">
  <link href="/ethan-wechat/Public/css/style.css" rel="stylesheet">

  <!-- ionic/angularjs js -->
  <script src="/ethan-wechat/Public/lib/ionic/js/ionic.bundle.js"></script>

  <!-- your app's js -->
  <script src="<?php echo U('indexApp.js');?>"></script>
   <!-- <script src="/ethan-wechat/Public/js/app.js"></script>
   <script src="/ethan-wechat/Public/js/controllers.js"></script> -->
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=U7N6PIKHKGEKgXmi5wqNfItn"></script>

 </head>
 <body>
  <ion-nav-bar class="bar-stable">
    <ion-nav-back-button>
    </ion-nav-back-button>
  </ion-nav-bar>
<ion-nav-view></ion-nav-view>
<!-- include -->
<script id="templates/indexHotel.html" type="text/ng-template">
<ion-view view-title="酒店介绍">
    <ion-content>
        <div class="row">
            <div class="col">
              <div class="col-demo">
                <i class="ion-shineiwifi">房间WiFi</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
              <i class="ion-wifi">大堂WiFi</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
                <i class="ion-tingche">免费停车</i>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <div class="col-demo">
                <i class="ion-feng">吹风机</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
              <i class="ion-24xiaoshireshui">全天热水</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
                <i class="ion-feiji2">免费接机</i>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-demo">
                    <i class="ion-jinzhixiyan">无烟房</i>
                </div>
            </div>
        </div>
        <div class="padding">
            <p>
                <a href="tel:18920909195" class="button button-block button-outline button-positive">酒店电话：13665656666</a>
            </p>
        </div>
        <div class="padding">
            <h4 class="basetext">酒店介绍</h4>
            <p>
              房间数：10间
            </p>
            <p>
              洛克公寓，本来生活。洛克高级酒店公寓位于天津市和平区南京路凯德国贸C座，紧邻小白楼地铁站C口及CBD核心商圈，是您旅游度假和商旅的优质选择。洛克高级酒店公寓的地理位置十分优越，毗邻天津著名文化风景区五大道，领略五大道历史的气息，城市的静谧在历史的长河里，在你的脚尖延展。回到洛克公寓，五大道观景一览无余，高处风光，别有一番滋味。同时紧邻天津市最为繁华的商业街滨江道，让你感受天津最繁华的生活。
            </p>
            <p class="basetext">
                最近装修时间：2015年
            </p>
        </div>
    </ion-content>
</ion-view>
</script>

<script id="templates/indexTabs.html" type="text/ng-template">
      <ion-tabs class="tabs-icon-top tabs-stable">

        <ion-tab title="首页" icon="ion-shouye" href="#/tab/home">
          <ion-nav-view name="home-tab"></ion-nav-view>
        </ion-tab>

        <ion-tab title="搜周边" icon="ion-lbs" href="#/tab/rim">
          <ion-nav-view name="rim-tab"></ion-nav-view>
        </ion-tab>

        <ion-tab title="活动" icon="ion-unie637" href="#/tab/activity">
          <ion-nav-view name="activity-tab"></ion-nav-view>
        </ion-tab>

        <ion-tab title="个人中心" icon="ion-studyuser" href="#/tab/personal">
          <ion-nav-view name="personal-tab"></ion-nav-view>
        </ion-tab>

      </ion-tabs>
    </script>

<script id="templates/indexHome.html" type="text/ng-template">
<ion-view view-title="首页" ng-controller="SlideCtrl">
   <ion-content>
<!-- 图片轮播 -->
      <ion-slide-box class="slides">
        <ion-slide class="box" ng-repeat="item in countEm">

            <img ng-src="{{ item }}">

        </ion-slide>
      </ion-slide-box>
<!-- 酒店介绍 -->
<div class="list">
    <div class="item item-thumbnail row">
        <div class="col-33">
          <a href="#/tab/evaluation">
            <h1 class="energized">4.9分</h1>
            <h2 class="energized">棒极了</h2>
            <p>100%好评</p>
            <p>84条评论></p>
          </a>
        </div>
        <div class="col-67">
            <img class="full-image" src="/ethan-wechat/Public/img/ditu.jpg">
        </div>
    </div>
      <a class="item row" href="#/tab/hotel">
        <i class="ion-shineiwifi col"></i>
        <i class="ion-wifi col"></i>
        <i class="ion-tingche col"></i>
        <i class="ion-feng col"></i>
        <i class="ion-24xiaoshireshui col"></i>
        <i class="ion-feiji2 col"></i>
        <i class="ion-right col"></i>
      </a>
    <a class="item item-button-right" href="#/tab/date">
    <i class="ion-rili"></i>
      12月01日-12月02日
    <button class="button button-clear">
      <h3 class="positive">共1晚></h3>
    </button>
    </a>
  <a class="item item-button-right" href="#/tab/confirmOrder">
    <h2>景观大床房</h2>
    <p>55平米大床1.8m有wifi</p>
    <span ng-click='toggleDetail()' class="item-note energized">
      ￥212起<i class="ion-down"></i>
    </span>
  </a>
  <div ng-show='detail' class="item">
      面积-55㎡<br>
      位于6-24层<br>
      大床<br>
      独立卫浴<br>
      有窗
      </div>

  <a class="item" href="#/tab/confirmOrder">
    <h2>豪华家庭套房</h2>
    <p>80平米大床1.8m有wifi</p>
    <span class="item-note energized">
      ￥368起<i class="ion-down"></i>
    </span>
  </a>
  <div class="item">
      面积-80㎡<br>
      位于6-20层<br>
      独立卫浴<br>
      有窗
  </div>
  <a class="item" href="#/tab/confirmOrder">
    <h2>豪华行政套房</h2>
    <p>80平米大床1.8m有wifi</p>
    <span class="item-note energized">
      ￥368起<i class="ion-down"></i>
    </span>
  </a>
  <div class="item">
      面积-80㎡<br>
      位于6-20层<br>
      独立卫浴<br>
      有窗
  </div>
<a class="item" href="tel:13920156607">
    <i class="ion-zhongdianfangbeijing"></i>
    钟点房
    <span class="item-note energized">
      3小时/￥91起
    </span>
  </a>
</div>
</ion-content>
</ion-view>

</script>

<script id="templates/indexRim.html" type="text/ng-template">
<ion-view view-title="搜周边">
<ion-content ng-controller="MapCtrl">
<div id="allmap" style="height:600px;width:100%;"></div>
</ion-content>
</ion-view>
</script>

<script id="templates/indexDate.html" type="text/ng-template">
	<ion-view view-title="选择日期">
	<div class="bar bar-subheader bar-stable">
  <a href="" class="button button-icon ion-back"></a>
  <h6 class="title">2015年12月</h6>
  <a href="" class="button button-icon ion-right"></a>
</div>
	<ion-content>
	<div class="list has-header">
		<div class="item row">
			<div class="col">日</div>
			<div class="col">一</div>
			<div class="col">二</div>
			<div class="col">三</div>
			<div class="col">四</div>
			<div class="col">五</div>
			<div class="col">六</div>
		</div>
		<div class="item row">
			<div class="col"></div>
			<div class="col"></div>
			<div class="col stable">1</div>
			<div class="col stable">2</div>
			<div class="col stable">3</div>
			<div class="col positive">4</div>
			<div class="col">5</div>
		</div>
		<div class="item row">
			<div class="col">6</div>
			<div class="col">7</div>
			<div class="col">8</div>
			<div class="col">9</div>
			<div class="col">10</div>
			<div class="col">11</div>
			<div class="col">12</div>
		</div>
		<div class="item row">
			<div class="col">13</div>
			<div class="col">14</div>
			<div class="col">15</div>
			<div class="col">16</div>
			<div class="col">17</div>
			<div class="col">18</div>
			<div class="col">19</div>
		</div>
		<div class="item row">
			<div class="col">20</div>
			<div class="col">21</div>
			<div class="col">22</div>
			<div class="col">23</div>
			<div class="col">24</div>
			<div class="col">25</div>
			<div class="col">26</div>
		</div>
		<div class="item row">
			<div class="col">27</div>
			<div class="col">28</div>
			<div class="col">29</div>
			<div class="col">30</div>
			<div class="col">31</div>
			<div class="col"></div>
			<div class="col"></div>
		</div>
	</div>
</ion-content>
</ion-view>
</script>
<script id="templates/indexConfirmOrder.html" type="text/ng-template">
<ion-view view-title="订单填写">
	<ion-content class="ion-content">
		<div class="">
      <h4 class="tittle">预付须知：</h4>
    </div>
    <div class="list">
      <a class="item item-thumbnail-left" href="#">
        <img src="/ethan-wechat/Public/img/big.jpg">
            <h2>房型：大床房</h2>
            <p>价格：365.00</p>
            <p>介绍：空调/电视/wifi</p>
            <p>入住时间：2015.11.25</p>
      </a>
      <label class="item item-input">
        <span class="input-label">房间数：</span>
        <select>
          <option selected>1</option>
          <option selected>2</option>
          <option selected>3</option>
          <option selected>4</option>
          <option selected>5</option>
        </select>
      </label>
      <label class="item item-input">
        <span class="input-label">到店时间：</span>
        <select>
          <option selected>14:00-次日04：00</option>
        </select>
      </label>
      <label class="item item-input">
        <span class="input-label">入住人：</span>
        <input type="text" />
      </label>
      <label class="item item-input">
        <span class="input-label">手机号：</span>
        <input type="text" />
      </label>
      <div class="item">
        <span class="danger">温馨提示：注意到店时间为14:00-04:00</span>
      </div>

      <div class="item item-checkbox">
         <label class="checkbox">
           <input type="checkbox" checked="">
         </label>
         用200积分换打折卡
      </div>
      <label class="item item-input">
        <span class="input-label">积分兑换：</span>
        <select>
          <option selected>用200积分换打折卡</option>
        </select>
      </label>
    </div>

    <div class="bar bar-footer">
      <div class="row">
        <div class="col-75">
          <h4 class="dollar pull-right">在线支付：￥365.00</h4>
        </div>
        <div class="col-25 col-demo">
          <a href="#/tab/paySuccess1">
            <div class="button button-large button-positive">
              提交订单
            </div>
          </a>
        </div>
      </div>
    </div>
	</ion-content>
</ion-view>
<script>


<script id="templates/indexHotel.html" type="text/ng-template">
<ion-view view-title="酒店介绍">
    <ion-content>
        <div class="row">
            <div class="col">
              <div class="col-demo">
                <i class="ion-shineiwifi">房间WiFi</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
              <i class="ion-wifi">大堂WiFi</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
                <i class="ion-tingche">免费停车</i>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <div class="col-demo">
                <i class="ion-feng">吹风机</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
              <i class="ion-24xiaoshireshui">全天热水</i>
              </div>
            </div>
            <div class="col">
              <div class="col-demo">
                <i class="ion-feiji2">免费接机</i>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-demo">
                    <i class="ion-jinzhixiyan">无烟房</i>
                </div>
            </div>
        </div>
        <div class="padding">
            <p>
                <a href="tel:18920909195" class="button button-block button-outline button-positive">酒店电话：13665656666</a>
            </p>
        </div>
        <div class="padding">
            <h4 class="basetext">酒店介绍</h4>
            <p>
              房间数：10间
            </p>
            <p>
              洛克公寓，本来生活。洛克高级酒店公寓位于天津市和平区南京路凯德国贸C座，紧邻小白楼地铁站C口及CBD核心商圈，是您旅游度假和商旅的优质选择。洛克高级酒店公寓的地理位置十分优越，毗邻天津著名文化风景区五大道，领略五大道历史的气息，城市的静谧在历史的长河里，在你的脚尖延展。回到洛克公寓，五大道观景一览无余，高处风光，别有一番滋味。同时紧邻天津市最为繁华的商业街滨江道，让你感受天津最繁华的生活。
            </p>
            <p class="basetext">
                最近装修时间：2015年
            </p>
        </div>
    </ion-content>
</ion-view>
</script>

<script id="templates/indexEvaluation.html" type="text/ng-template">
  <ion-view view-title="查看评论">
 
  <ion-content>
    <div class="list">
      <div class="item item-avatar" href="#">
        <img src="/ethan-wechat/Public/img/tupian.png" >
          <div class="row">
            <div class="col col-33">      
              <h2>Venkman</h2>
            </div>
            <div class="col"><img src="/ethan-wechat/Public/img/star.png"></div>
          </div>
          <p>很好，值得推荐</p>
          <div class="row">
          <div class="list">
            <div class="item-thumbnail-left">
              <img src="/ethan-wechat/Public/img/rujia.jpg">
            </div>
          </div>

          <div class="list">
            <div class="item-thumbnail-left">
              <img src="/ethan-wechat/Public/img/rujia.jpg">
            </div>
          </div>
          
          </div>
      </div>
    </div>
    <div class="padding">
     <a class="button button-block button-positive" href="#/tab/evaluationing">我要评论</a>
     </div>
  </div>
</ion-content>
</ion-view>
</script>
<script id="templates/indexEvaluationing.html" type="text/ng-template">
	<ion-view view-title="评论">
	<ion-content ng-controller='EvaluationingCtrl'>
		<div class="item item-thumbnail-left">
			<img src="/ethan-wechat/Public/img/rujia.jpg">
			<h2><i class="icon ion-social-yen"></i>120</h2>
			<p>介绍</p>
		</div>
		<div class="list">
			<div class="item item-body">
				<div class="row row-center">
					<div class="col col-20">
						<span>评分</span>
					</div>

					<div class="col">
						<img src="/ethan-wechat/Public/img/star.png">
					</div>
				</div>

				<div class="item item-input item-floating-label">
					<textarea type="text" placeholder="请输入您的评论" cols="60" rows="4" ></textarea>
				</div>

				
				<div class="row">
					<div class="col col-33-center">
						<button ng-click='upload()' class="button button-small button-outline ">
							<i class="icon ion-image"></i>
							上传图片
						</button>
					</div>
					<div class="col col-33">
						<div class="list">
							<div class="item-avatar">
							<img src="/ethan-wechat/Public/img/rujia.jpg">
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<a href="#/tab/success">
			<div class="padding">
				<button class="button button-full button-positive">
					提交评论
				</button>
			</div></a>
		<div>
	</div>
	</ion-content>
	</ion-view>
	</script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script id="templates/indexSuccess.html" type="text/ng-template">
<ion-view view-title="评论成功">
	<ion-content class="scroll-content has-header padding commentsok">
  <img src="/ethan-wechat/Public/img/mark.png">
  <h3>点评成功!</h3>
  <h3>获得积分+5</h3>

  <div class="padding">
  <a href="#/tab/integral1"><button class="button button-positive button-block">我的积分</button></a>
  <a href="#/tab/evaluation"><button class="button button-positive button-block">确定</button></a>
  </div>
</div>
</ion-content>
</ion-view>
</script>
<style type="text/css">
.commentsok
{
  text-align: center;
}
  
</style>
<script id="templates/indexActivity.html" type="text/ng-template">
<ion-view view-title="最新活动">
<ion-content>
	<div class="list card">
   
  <div class="item item-avatar">
    <img src="/ethan-wechat/Public/img/jian.jpg">
    <a href="#/tab/activityDetail">
    <h2>首单立减</h2>
    <p>截止到2015年11月24日</p></a>
  </div>

 
  <div class="item item-avatar">
    <img src="/ethan-wechat/Public/img/niunai.jpg">
    <a href="#/tab/activityDetail">
    <h2>住店送牛奶</h2>
    <p>截止到2015年11月24日</p>
    </a>
  </div>

 
  <div class="item item-avatar">
    <img src="/ethan-wechat/Public/img/niunai2.jpg">
    <a href="#/tab/activityDetail">
    <h2>积分兑好礼</h2>
    <p>截止到2015年11月24日</p>
    </a>
  </div>

 
  <div class="item item-avatar">
    <img src="/ethan-wechat/Public/img/jiudian.jpg">
    <a href="#/tab/activityDetail">
    <h2>积分兑好礼</h2>
    <p>截止到2015年11月24日</p>
    </a> 
  </div> 
	</div>
  </ion-content>
	</ion-view>
</script>
<script id="templates/indexActivityDetails.html" type="text/ng-template">
	<ion-view view-title="住店送牛奶">
	<ion-content>
			<div class="list card">
				<div class="item item-avatar">
					<img src="/ethan-wechat/Public/img/niunai.jpg">
					<h2>活动</h2>
					<p>住店送牛奶</p>
				</div>
				<div class="item item-body">
					<img class="full-image" src ="/ethan-wechat/Public/img/niunai.jpg">
					<p>
						2015年11月24日之前，凡到本店住宿者，均可在晚七点以后在前台领取热牛奶一杯。
					</p>
				</div>
			</div>
</ion-content>
</ion-view>
</script>
<script id="templates/indexPersonalCenter.html" type="text/ng-template">
	<ion-view view-title="个人中心">
	<ion-content>
	<div class="list">
		<a class="item item-avatar" href="#">
			<img src="/ethan-wechat/Public/img/1024.jpg">
			<h3>昵称</h3>
			<p>手机号</p>
		</a>

		<div class="button-bar">
			<a href="#/tab/toBePaid" class="button button-light">
				<i class="icon ion-daizhifu"></i>
				<p>待支付</p>
			</a>
			<a href="#/tab/toBeEvaluation" class="button button-light">
				<i class="icon ion-daipingjia2"></i>
				<p>待评价</p>
			</a>
			<a href="#/tab/toBeStay" class="button button-light">
				<i class="icon ion-ruzhu"></i>
				<p>待入住</p>
			</a>
	</div>

	<a href="#/tab/allOrder" class="item item-icon-left item-icon-right">
		<i class="icon ion-quanbudingdan"></i>
		全部订单
		<i class="icon ion-iconfontunie61f"></i>
	</a>
	<a href="#/tab/integral" class="item item-icon-left item-icon-right">
		<i class="icon ion-jifen"></i>
		查看积分
		<i class="icon ion-iconfontunie61f"></i>
	</a>
	<a href="tel:13920156607" class="item item-icon-left">
		<i class="icon ion-kefu"></i>
		客服  15302056835
	</a>
</div>
</ion-content>
</ion-view>
</script>

<script id="templates/indexToBePaid.html" type="text/ng-template">
	<ion-view view-title="待支付">
	<ion-content class="bar-content ">
	<div class="list">
		<div class="item item-thumbnail-left" href="#">
			<img src="/ethan-wechat/Public/img/big.jpg">
			<h2>房型：大床房</h2>
			<p>价格：365.00</p>
			<p>介绍：空调/电视/wifi</p>
			<p>入住时间：2015.11.25</p>
			<a href="#/tab/paySuccess"><div class="button button-icon-right button-small button-positive
                 pull button-right">立即支付</div></a>
		</div>

		<div class="item item-thumbnail-left" href="#">
			<img src="/ethan-wechat/Public/img/big.jpg">
			<h2>房型：大床房</h2>
			<p>价格：365.00</p>
			<p>介绍：空调/电视/wifi</p>
			<p>入住时间：2015.11.25</p>
			<a href="#/tab/paySuccess"><div class="button button-icon-right button-small button-positive
                 pull button-right">立即支付</div></a>
		</div>

		<div class="item item-thumbnail-left" href="#">
			<img src="/ethan-wechat/Public/img/big.jpg">
			<h2>房型：大床房</h2>
			<p>价格：365.00</p>
			<p>介绍：空调/电视/wifi</p>
			<p>入住时间：2015.11.25</p>
			<a href="#/tab/payError"><div class="button button-icon-right button-small button-positive
                 pull button-right">立即支付</div></a>
		</div>
		<div class="item item-thumbnail-left" href="#">
			<img src="/ethan-wechat/Public/img/big.jpg">
			<h2>房型：大床房</h2>
			<p>价格：365.00</p>
			<p>介绍：空调/电视/wifi</p>
			<p>入住时间：2015.11.25</p>
			<div class="button button-icon-right button-small button-positive
                 pull button-right">立即支付</div>
		</div>
		<div class="item item-thumbnail-left" href="#">
			<img src="/ethan-wechat/Public/img/big.jpg">
			<h2>房型：大床房</h2>
			<p>价格：365.00</p>
			<p>介绍：空调/电视/wifi</p>
			<p>入住时间：2015.11.25</p>
			<div class="button button-icon-right button-small button-positive
                 pull button-right">立即支付</div>
		</div>
	</div>

</ion-content>
</ion-view>
</script>

<script id="templates/indexToBeStay.html" type="text/ng-template">
<ion-view view-title="待入住">
	<ion-content class="bar-content ">
		<div class="list">
			<div class="item item-thumbnail-left" href="#">
				<img src="/ethan-wechat/Public/img/jiudian.jpg">
				<h2>价格：￥99.9</h2>
				<p>介绍:大床房</p>
				<p>入住时间:2015.11.23</p>
			</div>

			<div class="item item-thumbnail-left" href="#">
				<img src="/ethan-wechat/Public/img/jiudian.jpg">
				<h2>价格：￥99.9</h2>
				<p>介绍:大床房</p>
				<p>入住时间:2015.11.23</p>
			</div>

			<div class="item item-thumbnail-left" href="#">
				<img src="/ethan-wechat/Public/img/jiudian.jpg">
				<h2>价格：￥99.9</h2>
				<p>介绍:大床房</p>
				<p>入住时间:2015.11.23</p>
			</div>
		</div>	    
	</div>
	</ion-content>
</ion-view>
</script>
<script id="templates/indexToBeEvaluation.html" type="text/ng-template">
	<ion-view view-title="待评价">
	<ion-content class="bar-content ">
		<div class="list">
		    <div class="item item-thumbnail-left" href="#">
		      <img src="/ethan-wechat/Public/img/jiudian.jpg">
		      <h2>价格：￥99.9</h2>
		      <p>介绍:大床房</p>
		      <p>入住时间:2015.11.23</p>
                 <a href="#/tab/evaluationing1"><div class="button button-icon-right button-small button-positive
                 pull button-right">
                评价赢积分
		    	</div></a>
		    </div>

		    <div class="item item-thumbnail-left" href="#">
		      <img src="/ethan-wechat/Public/img/jiudian.jpg">
		      <h2>价格：￥99.9</h2>
		      <p>介绍:大床房</p>
		      <p>入住时间:2015.11.23</p>
                 <a href="#/tab/evaluationing1"><div class="button button-icon-right button-small button-positive
                 pull button-right">
                评价赢积分
		    	</div></a>
		    </div>

		    <div class="item item-thumbnail-left" href="#">
		      <img src="/ethan-wechat/Public/img/jiudian.jpg">
		      <h2>价格：￥99.9</h2>
		      <p>介绍:大床房</p>
		      <p>入住时间:2015.11.23</p>
                 <a href="#/tab/evaluationing1"><div class="button button-icon-right button-small button-positive
                 pull button-right">
                评价赢积分
		    	</div></a>
			</div>

		    <div class="item item-thumbnail-left" href="#">
		      <img src="/ethan-wechat/Public/img/jiudian.jpg">
		      <h2>价格：￥99.9</h2>
		      <p>介绍:大床房</p>
		      <p>入住时间:2015.11.23</p>
                 <a href="#/tab/evaluationing1"><div class="button button-icon-right button-small button-positive
                 pull button-right">
                评价赢积分
		    	</div></a>
		    </div>

		    <div class="item item-thumbnail-left" href="#">
		      <img src="/ethan-wechat/Public/img/jiudian.jpg">
		      <h2>价格：￥99.9</h2>
		      <p>介绍:大床房</p>
		      <p>入住时间:2015.11.23</p>
                 <a href="#/tab/evaluationing1"><div class="button button-icon-right button-small button-positive
                 pull button-right">
                评价赢积分
		    	</div></a>
		    </div> 

		    <div class="item item-thumbnail-left" href="#">
		      <img src="/ethan-wechat/Public/img/jiudian.jpg">
		      <h2>价格：￥99.9</h2>
		      <p>介绍:大床房</p>
		      <p>入住时间:2015.11.23</p>
                 <a href="#/tab/evaluationing1"><div class="button button-icon-right button-small button-positive
                 pull button-right">
                评价赢积分
		    	</div></a>
		    </div>
	    </div>
	</ion-content>
	</ion-view>
</script>
<script id="templates/indexIntegral.html" type="text/ng-template">
	<ion-view view-title="我的积分">
	<ion-content>
	</ion-content>

	</ion-view>
</script>
<script id="templates/indexAllOrder.html" type="text/ng-template">
<ion-view view-title="全部订单">
<ion-content>
		<div class="list">
			<div class="item item-thumbnail-left" href="#">
				<img src="/ethan-wechat/Public/img/jiudian.jpg">
				<h2>价格：￥99.9</h2>
				<h2>介绍:大床房</h2>
				<h2>入住时间:2015.11.23</h2>
			</div>

			<div class="item item-thumbnail-left" href="#">
				<img src="/ethan-wechat/Public/img/jiudian.jpg">
				<h2>价格：￥99.9</h2>
				<h2>介绍:大床房</h2>
				<h2>入住时间:2015.11.23</h2>
			</div>

			<div class="item item-thumbnail-left" href="#">
				<img src="/ethan-wechat/Public/img/jiudian.jpg">
				<h2>价格：￥99.9</h2>
				<h2>介绍:大床房</h2>
				<h2>入住时间:2015.11.23</h2>
			</div>
		</div>	    
	</div>
</ion-content>
</ion-view>
</script>
<script id="templates/indexPaySuccess.html" type="text/ng-template">
<ion-view view-title="">
    <ion-content>
        <div class="list">
            <div class="item item-avatar">
              <img src="/ethan-wechat/Public/img/success.png">
              <h2 class="success">支付成功！</h2>
              <p>恭喜您！！获得5积分！！</p>
              <a href="">查看积分>></a>
              
            </div>
            <a class="item item-thumbnail-left" href="#">
                <img src="/ethan-wechat/Public/img/big.jpg">
                <h2>房型：大床房</h2>
                <p>价格：365.00</p>
                <p>介绍：空调/电视/wifi</p>
                <p>入住时间：2015.11.25</p>
            </a>
        </div>
    </ion-content>
</ion-view>
</script>


</body>


</html>