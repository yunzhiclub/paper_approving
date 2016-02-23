<extend name="Base:index" />
<block name="body">
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
	<form action="{:U('resetSome?p=')}" method="post">
		<button class="button btn btn-sm btn-primary" type="submit">重置所选专家的密码</button>
		<div class="panel-body" id="test">
		</div>

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" id="ckAll" />全选</th>
					<th>序号</th>
					<th>专家姓名</th>
					<th>论文名称</th>
					<th>学科领域</th>
					<th>工作单位</th>
					<th>电子邮编</th>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
				<foreach name="experts" item="expert" key="k">
					<tr>
						<td><input type="checkbox" name="sub[]" value="{$expert['id']}" /></td>
						<td>{$k+1}</td>
						<td>{$expert['name']}</td>
						<td></td>
						<td>{$expert['field']}</td>
						<td>{$expert['work_unit']}</td>
						<td>{$expert['email']}</td>
						
						<td>
							<a class="button btn btn-sm btn-primary" href="{:U('reset?id='.$expert['id'],I('get.'))}"><i class="fa fa-pencil"></i>&nbsp;重置密码</a>
							<a class="button btn btn-sm btn-success" href="">下载评阅表</a>
						</td>
					</tr>
				</foreach>
			</tbody>
		</table>
	</form>

	<script>

		$("#ckAll").click(function() {
			$("input[name='sub[]']").prop("checked", this.checked);
		});

		$("input[name='sub']").click(function() {
			var $subs = $("input[name='sub']");
			$("#ckAll").prop("checked" , $subs.length == $subs.filter(":checked").length ? true :false);
		});


	</script>
</block>	

