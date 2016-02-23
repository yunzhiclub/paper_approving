<extend name="Base:index" />
<block name="body">
	<form class="form-horizontal" method="post" action="{:U('save')}">
		<input type="hidden" name="id" value="{$student['id']}"></input>
		
		<div class="form-group">
			<label for="name" class="col-xs-2 control-label">姓名</label>
			<div class="col-xs-4">
				<input id="name" type ="text" name="name" value="{$student['name']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-2 control-label">姓名</label>
			<div class="col-xs-4">
				<input id="studentid" type ="text" name="studentid" value="{$student['studentid']}" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label for="admission_date" class="col-xs-2 control-label">入学年月</label>
			<div class="col-xs-4">
				<input id="admission_date" type ="date" name="admission_date" value="{$student['admission_date']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="subject_major" class="col-xs-2 control-label">专业</label>
			<div class="col-xs-4">
				<input id="subject_major" type ="text" name="subject_major" value="{$student['subject_major']}" class="form-control">
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
			<div class="col-xs-4">
				<input id="innovation_point" type ="text" name="innovation_point" value="{$student['innovation_point']}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="cyle_id" class="col-xs-2 control-label">周期id</label>
			<div class="col-xs-4">
				<input id="cyle_id" type ="text" name="cyle_id" value="{$student['cyle_id']}" class="form-control">
			</div>
		</div>


	<div class="form-group">
			<label for="create_time" class="col-xs-2 control-label">学生创建时间</label>
			<div class="col-xs-4">
				<input id="create_time" type ="date" name="create_time" value="{$student['create_time']}" class="form-control">
			</div>
		</div>


<div class="form-group">
			<label for="attachment_id" class="col-xs-2 control-label">附件id</label>
			<div class="col-xs-4">
				<input id="attachment_id" type ="text" name="attachment_id" value="{$student['attachment_id']}" class="form-control">
			</div>
		</div>



		<div class="col-xs-offset-2 col-xs-10">
			<button type="submit" class="btn btn-sm btn-success" ><i class="fa fa-check "></i>保存</button>
		</div>
	</form>
</block>