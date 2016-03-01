<extend name="Base:index" />

<block name="wrapper">
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>
				本论文送审系统的使用流程
			</h3>
			<p>
				1.在指定的系统开放日期内通过获取的用户名，密码登录本系统。<br/>
                2.在 <a href="{:U('Expert/index')}">个人信息</a> 栏目中完善姓名，技术职称，导师类别等个人信息。
                <br/>
                3.在 <a href="{:U('Reviews/index')}">查阅评分标准</a> 栏目中查阅评分标准详细信息<br/>
                4.下载论文：在 <a href="{:U('ReviewDetail/index')}">评阅论文</a> 栏目的"电子文档"一栏中，点击 下载文档，进行论文的下载；若 "电子文档"一栏中显示『未上传』，请您及时联系我们。<br />
                5.评阅论文：
                参考评分标准，给出论文具体得分，系统将自动计算出加权得分及总得分；给出是否同意答辩，是否推荐评选优秀论文，对论文的熟悉程度，评阅意见。<br />
                6.提交评阅内容：在 <a href="{:U('ReviewDetail/index')}">评阅论文</a> 栏目中，点击 提交 ，出现操作成功，数据即保存成功。在系统开放日期内，您可以随时登陆系统进行评阅意见的修改并得新提交。<br />
                7.<a href="{:U('Login/logout')}">注销登陆</a><br /><br />
                联系电话：xxxx, 邮箱：xxx,联系人：xxx;

			</p>
		</div>
	</div>
</div>
</block>