<extend name="Base:index" />
<block name="wrapper">
    <form ng-app="ReviewDetail" ng-controller="index">
        <table class="table table-bordered table-hover table-condensed">
        {:dump($expert)}
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
                    {$expert['title']}
                </td>
            </tr>
            <tr><td class="success">创新点</td><td>{$expert['innovation_point']}</td></tr>
            <tr>
                <td class="success">
                    电子文档
                </td>
                <td>
                <eq name="expert['attachment_id']" value="0">
					未上传
                <else />
					<a target="_blank" href="__UPLOADS__{$expert['attachment__savepath']}{$expert['attachment__savename']}">点击下载</a>
                </eq>
                    
                </td>
            </tr>
        </table>
        <h4>评阅表</h4>
        <table class="table table-bordered table-hover table-condensed">
            <tr class="success">
                <th>评阅项目</th>
                <th>权重</th>
                <th>具体得分（百分制）</th>
                <th>加权得分</th>
            </tr>
            <foreach name="reviews" item="review">
            <tr>
                <td>{$review['title']}<br /><span class="small">{$review['factor']}</span></td>
                <td>{$review['proportion']}%</td>
                <td>{$review['']}</td>
                <td>{$review['']}</td>
                <td>{$review['']}</td>
            </tr>
            </foreach>       
            
            <tr>
                <td>是否同意答辩
                </td>
                <td colspan="3">
                    <input type="radio" name="hi" /> 同意答辩
                    <br>
                    <input type="radio" name="hi" /> 同意经过小的修改后答辩（可不再送审）
                    <br>
                    <input type="radio" name="hi" /> 需要进行较大的修改后答辩（修改后送原专家送审）
                    <br>
                    <input type="radio" name="hi" /> 未达到学位论文要求，不同意答辩
                </td>
            </tr>
            <tr>
                <td>是否推荐评选优秀论文</td>
                <td colspan="3">
                    <input type="radio" name="hi" /> 省级
                    <br>
                    <input type="radio" name="hi" /> 校级
                    <br>
                    <input type="radio" name="hi" /> 不推荐
                </td>
            </tr>
            <tr>
                <td>对论文内容的熟悉程度</td>
                <td colspan="3">
                    <input type="radio" name="hi" /> 很熟悉
                    <br>
                    <input type="radio" name="hi" /> 熟悉
                    <br>
                    <input type="radio" name="hi" /> 一般了解
                </td>
            </tr>
            <tr>
                <td>对论文内容的熟悉程度</td>
                <td colspan="3">
                    <input type="radio" name="hi" /> 很熟悉
                    <br>
                    <input type="radio" name="hi" /> 熟悉
                    <br>
                    <input type="radio" name="hi" /> 一般了解
                </td>
            </tr>
            <tr>
                <td>
                	评阅意见<br />(请结合以上各评阅项目进行简要评价并提出论文存在的问题、不足以及修改建议)
                </td>
                <td colspan="3">
                    <textarea cols="100" rows="10"></textarea>
                </td>
            </tr>
        </table>
        <div class="col-sm-offset-5">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check "></i>提交</button>
        </div>
    </form>
</block>
<script type="text/javascript">
$(document).ready(function() {
    $(".js-example-basic-single").select2();
});
</script>
