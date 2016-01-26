<extend name="Base:index" />
<block name="body">
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>序号</th>
				<th>专家id</th>
				<th>论文名称</th>
				<th>评阅项目比重</th>
				<th>各项分数</th>
				<th>总分</th>
				<th>是否答辩</th>	
				<th>是否是优秀论文</th>
				<th>对论文熟悉程度</th>
			</tr>
		</thead>
		<tbody>
			<foreach name="reviews" item="review" key="k">
				<tr>
					<td>{$k+1}</td>
					<td>{$review['expert_id']}</td>
					<td>{$review['title']}</td>
					<td>{$review['proportion']}</td>
					<td>{$review['score']}</td>
					<td>{$review['total_score']}</td>
					<td><eq name="review['defense']" value="0">是<else/>否</eq></td>
					<td><eq name="review['recommend']" value="0">是<else/>否</eq></td>
					<td>{$review['familiar_degree']}</td>
					<td>
						<a class="button btn btn-sm btn-primary" href="{:U('reset?expert_id='.$review['expert_id'],I('get.'))}"><i class="fa fa-pencil"></i>&nbsp;重置密码</a>
						<a class="button btn btn-sm btn-success" href="">下载评阅表</a>
					</td>
				</tr>
			</foreach>
		</tbody>
	</table>
</block>	

