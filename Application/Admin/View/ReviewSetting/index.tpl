<extend name="Base:index" />
<block name="body">
	<div class="row">
		<div class="col-md-3">
			<form action="{:U('index?keywords=')}" method="get">
				<div class="input-group custom-search-form">
					<input class="form-control" name="keywords" placeholder="Search..." type="text" value="{:I('get.keywords')}" />
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-3">
			<a href="{:U('edit?id=', I('get.'))}" class="btn btn-info">添加评阅项目</a>
		</div>
	</div>
	<div class="panel-body">
	</div>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>序号</th>
				<?php $order = I('get.order') ?>
				<th><a href="<eq name='order' value="desc">{:U('index?by=title&order=asc', I('get.'))}<else/> {:U('index?by=title&order=desc', I('get.'))}</eq>">评阅项目名称</a></th>
				<th>评阅要素</th>
				<th>比重</th>
				<th><a href="<eq name='order' value="desc">{:U('index?by=weight&order=asc', I('get.'))}  
					<else/> {:U('index?by=weight&order=desc', I('get.'))} </eq>">权重</a></th>
					<th>状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<foreach name="reviews" item="review" key="k">
					<tr>
						<td>{$k+1}</td>
						<td>{$review['title']}</td>
						<td>{$review['factor']}</td>
						<td>{$review['proportion']}%</td>
						<td>{$review['weight']}</td>
						<td><eq name="review['status']" value="0">正常<else/><span class="badge">冻结</span></eq></td>
						<td>
							<a class="button btn btn-sm btn-primary" href="{:U('edit?id='.$review['id'],I('get.'))}"><i class="fa fa-pencil"></i>&nbsp;编辑</a>
							<a class="button btn btn-sm btn-success" href="{:U('delete?id='.$review['id'],I('get.'))}"><i class="fa fa-trash-o "></i>&nbsp;删除</a>
						</td>
					</tr>
				</foreach>
			</tbody>
		</table>
		<nav>
			<Yunzhi:page />
		</nav>
	</block>