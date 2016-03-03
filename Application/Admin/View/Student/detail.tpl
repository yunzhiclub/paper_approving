<extend name="Base:index" />
<block name="body">
	<div class="form-horizontal">
		

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">姓名</label>
			<div class="col-xs-4"><p>{$student['name']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">学号</label>
			<div class="col-xs-4"><p>{$student['student_no']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">入学年月</label>
			<div class="col-xs-4"><p>{$student['admission_date']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">专业</label>
			<div class="col-xs-4"><p>{$student['subject_major']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">论文密级</label>
			<div class="col-xs-4"><p><eq name="student['secret']" value="0">公开<else/>内部保存</eq></p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">研究方向</label>
			<div class="col-xs-4"><p>{$student['research_direction']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">论文题目</label>
			<div class="col-xs-4"><p>{$student['title']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">论文创新点</label>
			<div class="col-xs-4"><p>{$student['innovation_point']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">周期</label>
			<div class="col-xs-4"><p>{$cycle['name']}</p>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-1 control-label">学生创建时间</label>
			<div class="col-xs-4"><p>{$student['create_time']}</p>
			</div>
		</div>

		



	</div>
</block>