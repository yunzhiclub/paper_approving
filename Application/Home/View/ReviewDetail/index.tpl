<extend name="Base:index" />
<block name="wrapper">
	<div class="row-fluid">
		<div class="span12">
			<!-- <div class="page-header">
				<h3>
					开始评阅论文
				</h3>
			</div> -->
			<form>
			<table class="table table-bordered table-hover table-condensed">
				<tbody>
					<tr>
						<td class="success">
							论文类型
						</td>
						<td>
							全日制专业学位硕士研究生毕业论文
						</td>
					</tr>
					<tr>
						<td class="success">
							论文题目
						</td>
						<td>
							微型框架的设计与实现
						</td>
					</tr>
					<tr>
						<td class="success">
							电子文档
						</td>
						<td>
							点击下载
						</td>	
					</tr>
				</tbody>
			</table>
			<h4>评阅表</h4>
			<table class="table table-bordered table-hover table-condensed">
				<tbody>
					<tr class="success">
					<td>评阅栏目</td>
					<td>
						<table class="table table-bordered table-hover table-condensed">
							<thead>
								<tr class="success">
			                    	<th>评阅项目</th>
			                    	<th>权重</th>
			                    	<th>具体得分（百分制）</th>
			                    	<th>加权得分</th>
		                    	</tr>
							</thead>
							<tbody>
							<tr>
							<td>1、论文选题(A)</td>
							<td>12%</td>
							<td>
							<select class="selectpicker form-control">
							<?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
							<td>2、文献综述(B)</td>
							<td>16%</td>
							<td><select class="selectpicker form-control">
                                        <?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
							<td>3、基础理论知识与专业知识（C）</td>
							<td>15%</td>
							<td><select class="selectpicker form-control">
                                        <?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
							<td>4、工作难度与工作量（D）</td>
							<td>12%</td>
							<td><select class="selectpicker form-control">
                                        <?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
							<td>5、解决实际问题的能力（E）</td>
							<td>20%</td>
							<td><select class="selectpicker form-control">
                                        <?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
							<td>6、论文成果与新见解（E）</td>
							<td>15%</td>
							<td><select class="selectpicker form-control">
                                        <?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
							<td>7、论文写作能力（G）</td>
							<td>10%</td>
							<td><select class="selectpicker form-control">
                                        <?php 
							for ($x=1; $x<=100; $x++) {
							  echo "<option>$x</option>";
							} 
							?>
                                    </select>
                            </td>
                            <td>
                            	9
                            </td>
							</tr>
							<tr>
								<td>总得分：12%*A+16%*B+15%*C+12%*D+20%*E+15%*F+10%*G=82分
								</td>
							</tr>
							</tbody>
						</table>
					</td>
					</tr>
					<tr>
						<td>是否同意答辩
						</td>
						<td>
							<input type="checkbox" /> 同意答辩<br>
							<input type="checkbox"/> 同意经过小的修改后答辩（可不再送审）<br>
							<input type="checkbox"/> 需要进行较大的修改后答辩（修改后送原专家送审）<br>
							<input type="checkbox"/> 未达到学位论文要求，不同意答辩
						</td>
					</tr>
					<tr>
						<td>是否推荐评选优秀论文</td>
						<td>
							<input type="checkbox" /> 省级<br>
							<input type="checkbox"/> 校级<br>
							<input type="checkbox"/> 不推荐
						</td>
					</tr>
					<tr>
						<td>对论文内容的熟悉程度</td>
						<td>
							<input type="checkbox" /> 很熟悉<br>
							<input type="checkbox"/> 熟悉<br>
							<input type="checkbox"/> 一般了解
						</td>
					</tr>
					<tr>
						<td>评阅意见<br>(请结合以上各评阅项目进行简要评价并提出论文存在的问题、不足以及修改建议)</td>
						<td><div class="col-md-3"><textarea></textarea></div><td>
					</tr>
				</tbody>
			</table>
			<div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check "></i>提交</button>
            </div>
		</div>
	</div>
</block>