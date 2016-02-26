<extend name="Base:index" />
<block name="body">
	<div class="panel-body">
	</div>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>序号</th>
				<?php $order = I('get.order') ?>
				<th><a href="<eq name='order' value="desc">{:U('index?by=title&order=asc', I('get.'))}<else/> {:U('index?by=title&order=desc', I('get.'))}</eq>">评阅项目名称</a></th>
				<th>评阅要素</th>
				<th>权重</th>
				<th>评分细则</th>
			</thead>
			<tbody>
				<foreach name="reviews" item="review" key="k">
					<tr>
						<td>{$k+1}</td>
						<td>{$review['title']}</td>
						<td>{$review['factor']}</td>
						<td>{$review['proportion']}%</td>
						<td>{$review['detail']}</td>
					</tr>
				</foreach>
			</tbody>
		</table>
		<nav>
			<Yunzhi:page />
		</nav>
	</block>