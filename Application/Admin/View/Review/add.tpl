<extend name="Base:index" />
<block name="body">
	<form class="form-horizontal" method="post" action="{:U('save')}">
		<input type="hidden" name="id" value="{$review['id']}"></input>
		
		<div class="form-group">
			<label for="title" class="col-xs-2 control-label">评阅项目名称</label>
			<div class="col-xs-4">
				<input id="title" type ="text" name="title" value="{$review['title']}" class="form-control">

			</div>
		</div>

		<div class="form-group">
			<label for="factor" class="col-xs-2 control-label">评阅要素</label>
			<div class="col-xs-4">
				<textarea id="factor" type="text" placeholder="请输入新的评阅要素的详情" name="factor" cols="100" rows="5">{$review['factor']}</textarea>

			</div>
		</div>

		<div class="form-group">
			<label for="title" class="col-xs-2 control-label">比重</label>
			<div class="col-xs-4">
				<input id="title" type ="text" name="proportion" value="{$review['proportion']}" class="form-control">

			</div>
		</div>
		<div class="form-group">
			<label for="title" class="col-xs-2 control-label">权重</label>
			<div class="col-xs-4">
				<input id="title" type ="text" name="weight" value="{$review['weight']}" class="form-control">

			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">状态</label>
			<div class="col-sm-4">
				<div class="col-md-6 form-group">
					<select class="selectpicker form-control" name="status">
						<option value="1">冻结</option>
						<option value="0" <eq name="review['status']" value="0">selected="selected"</eq>>正常</option>
					</select><!-- /.input group -->
				</div>
			</div>
		</div>

		<div class="col-xs-offset-2 col-xs-10">
			<button type="submit" class="btn btn-sm btn-success" ><i class="fa fa-check "></i>保存</button>
		</div>
	</form>
</block>