<extend name="Base:index" />
<block name="wrapper">
    <form ng-app="ReviewDetail" ng-controller="index" method="post" action="{:U('save')}">
        <table class="table table-bordered table-hover table-condensed">
            <php>$expert = session('expert');</php>
            <tr>

                <td class="success">
                    论文类型
                </td>
                <td>
                    <eq name="expert['type']" value="专硕">
                        全日制专业学位硕士研究生毕业论文
                    </eq>
                    <eq name="expert['type']" value="学硕">
                        全日制学术型硕士研究生毕业论文
                    </eq>
                    <eq name="expert['type']" value="博士">
                        博士研究生毕业论文
                    </eq>
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
            <tr>
                <td class="success">创新点</td>
                <td>{$expert['innovation_point']}</td>
            </tr>
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
                <th width="40%">评阅项目</th>
                <th width="20%">权重</th>
                <th width="20%">具体得分（百分制）</th>
                <th width="20%">加权得分</th>
            </tr>
            <tr ng-repeat="review in reviews">
                <td>{{review.title}}
                    <br /><span class="small">{{review.factor}}</span></td>
                <td>{{review.proportion}}%</td>
                <td>
                    <input name="score[]" type="number" min="0" max="100" ng-model="review.score" ng-change="changeScore()" />
                </td>
                <td>{{(review.score * review.proportion)/100}}</td>
                <tr>
                    <tr class="success">
                        <td>总分:</td>
                        <td>100%</td>
                        <td><b>{{score}}</b></td>
                        <td><b>{{score}}</b></td>
                    </tr>
                    <td>是否同意答辩 
                    </td>
                    <td colspan="3">
                        <input type="hidden" name="expert_id" value="{$expert['id']}" />
                        <input id="defense0" type="radio" ng-model="reviewDetailOther.defense" name="defense" value="0" required /> <label for="defense0">同意答辩</label>
                        <br>
                        <input id="defense1" type="radio" ng-model="reviewDetailOther.defense" name="defense" value="1" /> <label for="defense1">同意经过小的修改后答辩（可不再送审）</label>
                        <br>
                        <input id="defense2" type="radio" ng-model="reviewDetailOther.defense" name="defense" value="2" /> <label for="defense2">需要进行较大的修改后答辩（修改后送原专家送审）</label>
                        <br>
                        <input id="defense3" type="radio" ng-model="reviewDetailOther.defense" name="defense" value="3" /> <label for="defense3">未达到学位论文要求，不同意答辩</label>
                    </td>
                </tr>
                <tr>
                    <td>是否推荐评选优秀论文</td>
                    <td colspan="3">
                        <input type="radio" ng-model="reviewDetailOther.excellent" name="excellent" value="0" id="excellent0" required /> <label for="excellent0">省级</label>
                        <br>
                        <input type="radio" ng-model="reviewDetailOther.excellent" name="excellent" value="1" id="excellent1" /> <label for="excellent1">校级</label>
                        <br>
                        <input type="radio" ng-model="reviewDetailOther.excellent" name="excellent" value="2" id="excellent2" /> <label for="excellent2">不推荐</label>
                    </td>
                </tr>
                <tr>
                    <td>对论文内容的熟悉程度</td>
                    <td colspan="3">
                        <input type="radio" name="familiar" ng-model="reviewDetailOther.familiar" value="0" id="familiar0" required /> <label for="familiar0">很熟悉</label>
                        <br>
                        <input type="radio" name="familiar" ng-model="reviewDetailOther.familiar" value="1" id="familiar1" /> <label for="familiar1">熟悉</label>
                        <br>
                        <input type="radio" name="familiar" ng-model="reviewDetailOther.familiar" value="2" id="familiar2" /> <label for="familiar2">一般了解</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        评阅意见
                        <br />(请结合以上各评阅项目进行简要评价并提出论文存在的问题、不足以及修改建议)
                    </td>
                    <td colspan="3">
                        <textarea cols="100" rows="10" ng-model="reviewDetailOther.suggestion" name="suggestion"></textarea>
                    </td>
                </tr>
        </table>
        <div class="col-sm-offset-5">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> 提交</button>
        </div>
    </form>
    <include file="index.js" />
</block>
