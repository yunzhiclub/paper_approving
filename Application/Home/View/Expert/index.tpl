<extend name="Base:index" />
<block name="wrapper">
<div class="page-header">
				<h4>
					填写个人信息
				</h4>
			</div>
			<div class="row-fluid">
		<div class="span12">
			<table class="table table-bordered table-hover table-condensed">
				<tbody>
					<tr>
						<td class="success">
							专家姓名
						</td>
						<td>
							<input id="name" name="name" class="form-control"/>
						</td>
					</tr>
					<tr>
						<td class="success">
							技术职称
						</td>
						<td>
							<input type="checkbox" />正高级
							<input type="checkbox" checked="checked" />副高级
						</td>
					</tr>
					<tr>
						<td class="success">
							导师类别
						</td>
						<td>
							<input type="checkbox" /> 博导
							<input type="checkbox" checked="checked" /> 硕导
						</td>
					</tr>
					</tbody>
					</table>
					<div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check "></i>提交</button>
            </div>
            </div>
            </div>
</block>