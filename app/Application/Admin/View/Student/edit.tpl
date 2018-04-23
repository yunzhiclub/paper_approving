<extend name="Base:index" />
<block name="body">
	<form class="form-horizontal" method="post" action="{:U('save', I('get.'))}">
		<input type="hidden" name="id" value="{$student['id']}"></input>
		
		<div class="form-group">
			<label for="name" class="col-xs-2 control-label">姓名</label>
			<div class="col-xs-4">
				<input id="name" type ="text" name="name" value="{$student['name']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-2 control-label">学号</label>
			<div class="col-xs-4">
				<input id="student_no" type ="text" name="student_no" value="{$student['student_no']}" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label for="admission_date" class="col-xs-2 control-label">入学年月</label>
			<div class="col-xs-4">
				<input id="admission_date" type ="text" name="admission_date" value="{$student['admission_date']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="subject_major" class="col-xs-2 control-label">专业</label>
			<div class="col-xs-4">
				<input id="subject_major" type ="text" name="subject_major" value="{$student['subject_major']}" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="subject_major" class="col-xs-2 control-label">类型</label>
			<div class="col-xs-4">
				<input id="type" type ="text" name="type" value="{$student['type']}" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="secret" class="col-xs-2 control-label">论文密级</label>
			<div class="col-xs-4">
				<input id="secret" type ="text" name="secret" value="{$student['secret']}" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="research_direction" class="col-xs-2 control-label">研究方向</label>
			<div class="col-xs-4">
				<input id="research_direction" type ="text" name="research_direction" value="{$student['research_direction']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="title" class="col-xs-2 control-label">论文题目</label>
			<div class="col-xs-4">
				<input id="title" type ="text" name="title" value="{$student['title']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="innovation_point" class="col-xs-2 control-label">论文创新点</label>
			<div class="col-xs-8">
				<textarea class="form-control" rows="20" name="innovation_point">{$student['innovation_point']}</textarea>
			</div>
		</div>

		<div class="col-xs-offset-2 col-xs-10">
			<button type="submit" class="btn btn-sm btn-success" ><i class="fa fa-check "></i>保存</button>
		</div>
	</form>
</block>