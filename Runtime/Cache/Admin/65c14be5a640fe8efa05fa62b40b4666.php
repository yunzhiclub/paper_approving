<?php if (!defined('THINK_PATH')) exit();?><div>
    <a class="button"  href="<?php echo U('add');?>" >添加用户</a>
</div>
<form action="<?php echo U('index');?>" method="get">
<div>
    <input type = "text" placeholder = "search" name = "keywords" value = "<?php echo I('get.keywords');?>"></input>
    <button id="search" type="submit">搜索</button>
</div>

<table class = "table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>序号</th>
			<?php $order = I('get.order') ?>
			<th><a href="<?php if(($order) == "desc"): echo U('index?by=id&order=asc', I('get.'));?>  
			<?php else: ?> <?php echo U('index?by=id&order=desc', I('get.')); endif; ?>">ID</a></th>	
			<th>用户名</th>
			<th>手机号</th>
			<th>姓名</th>
			<th>身份证号</th>
			<th>邮箱</th>
			<th>操作</th>
		</tr>
	</thead>
		<?php if(is_array($users)): foreach($users as $k=>$user): ?><tr>
				<td><?php echo ($k+1); ?></td>
				<td><?php echo ($user[id]); ?></td>
				<td><?php echo ($user[username]); ?></td>
				<td><?php echo ($user[phonenumber]); ?></td>
				<td><?php echo ($user[name]); ?></td>
				<td><?php echo ($user[idcard]); ?></td>
				<td><?php echo ($user[email]); ?></td>
				<td><a class="button" href="<?php echo U('detail?id='.$user['id']);?>">查看</a>&nbsp;&nbsp;
				<a class="button" href="<?php echo U('edit?id='.$user['id']);?>">编辑</a>&nbsp;&nbsp;
				<a class="button" href="<?php echo U('delete?id='.$user['id']);?>">删除</a>
			</tr><?php endforeach; endif; ?>	
</table>
</form>
<?php $page = new Think\Page(8,2);echo $page->show(); ?>