<?php
namespace Review\logic;

use Review\Model\ReviewModel;
use Expert\Logic\ExpertLogic;
use ExpertView\Logic\ExpertViewLogic;                   //专家视图信息
use ReviewDetailView\Logic\ReviewDetailViewLogic;       //评阅详情
use ReviewDetailOther\Logic\ReviewDetailOtherLogic;     //评阅详情其它信息
use PhpOffice\PhpWord\Settings;                         //phpword设置
use PhpOffice\PhpWord\TemplateProcessor;                //phpword模板
use Cycle\Logic\CycleLogic;                             //周期

class ReviewLogic extends ReviewModel
{

    //评阅等级设置
    private $levels = array(array("key"=>0, "score" => 59, "detail" => "不合格", "level"=>"\u2163"), array("key"=>1, "score" => 79, "detail" => "合格", "level"=>'\u2162'), array("key"=>2, "score" => 89, "detail" => "良好", "level"=>'\u2161'), array("key"=>3, "score" => 100, "detail" => "优秀", "level"=>'\u2160'));

    //答辩意见配置
    private $defenseConfigs = array(0=>"同意答辩（达到学位论文要求", 1=>"同意修改后答辩（修改后经导师同意可以答辩）", 2=>"较大重大修改（与学位论文要求有一定差距），需进行较大或重大修改，修改后重新送审）", 3=>"不同意答辩（未达到学位论文要求");

    //获取答辩意见配置信息
    public function getDefenseConfigs()
    {
        return $this->defenseConfigs;
    }

   
    public function getSavePathByExpertId($expertId)
    {
        $ExpertViewL = new ExpertViewLogic();
        $expertView = $ExpertViewL->getListById($expertId);
        if ($expertView === false || $expertView === null)
        {
            $this->setError("ReviewLogic getSaveNameByExpertId : Expert info not exist." . $ExpertViewL->getError());
            return false;
        }

        //取出周期值
        $cycleId = $expertView['cycle_id'];

        //拼接文件夹
        $saveName = __ROOT__ . '/download/review/' . $cycleId;

        //创建文件夹
        $dirName = I('server.DOCUMENT_ROOT') . $saveName;
        if (!is_dir($dirName))
        {
            if (mkdir($dirName, 0755) === false)
            {
                $this->setError("can't create folder $deirName");
                return false;
            }
        }
        
        //拼接后返回
        return $saveName . '/';
    }

    /**
     * 通过分值，取出等级    
     * @return string
     */
    public function getLevelByScore($score)
    {
        $level = $this->getLevelInfoByScore($score);
        if ($level === false)
        {
            return false;
        }
        else
        {
            return $level['key'];
        }      
    }

    /**
     * 通过分值，获取等级信息
     * @param  int $score 分值
     * @return list   
     * panjie
     * 2016.03
     */
    public function getLevelInfoByScore($score)
    {
        $score = (int)$score;
        foreach($this->levels as $key => $level)
        {
            if ($score <= $level['score'])
            {
                return $level;
            }
        }

        $this->setError("Score can't more than 100");
        return false;
    }
    /**
     * 获取相应等的罗马值
     * @param  int $score 分值
     * @return 分值对应的希腊值
     */
    public function getLevelNumByScore($score)
    {
        $level = $this->getLevelInfoByScore($score);
        if ($level === false)
        {
            return false;
        }
        else
        {
            return unicode_decode($level['level'], 'UTF-8', true, '\u', '');
        }
    }

    /**
     * 通过专家ID生成WORD版本的评阅信息
     * @param  int $expertId 专家ID
     * @return array   saveFile:生成文件的绝对路径; fileName:原文件名
     * panjie
     * 2016.02
     */
    public function makeWordByExpertId($expertId)
    {
        //查找专家对应的学生论文信息
        $ExpertViewL = new ExpertViewLogic();
        $expertView =  $ExpertViewL->getListById($expertId);
        if ($expertView === false || $expertView === null)
        {
            $this->setError("ExpertId is incorect!");
            return false;
        }  

        //判断是否已评阅
        if ($expertView['is_reviewed'] === 0)
        {
            $this->setError("The paper not reviewed, can not download.");
            return false;
        }

        // dump($expertView);
        //查找专家对应的评阅详情信息
        $ReviewDetailViewL = new ReviewDetailViewLogic();
        $reviewDetailViews = $ReviewDetailViewL->getListsByExpertId($expertId);
        
        //查找专家对应的评阅详情其它信息
        $ReviewDetailOtherL = new ReviewDetailOtherLogic();
        $reviewDetailOther = $ReviewDetailOtherL->getListByExpertId($expertId);

        //将数据传入word模板，指引用户下载
        Settings::loadConfig();

        $savePath = $this->getSavePathByExpertId($expertId);
        $saveName = substr($expertView['attachment__name'], 0, strpos($expertView['attachment__name'], ".")) . '-' . $expertView['id'] . $expertView['name'];
        
        $saveName = str_replace( " ", "",$saveName); //去空格

        $saveFile = I('server.DOCUMENT_ROOT') . $savePath . $saveName . '.doc';

        //根据学生类型，对应不同的评阅模板
        switch ($expertView['type']) {
            case '专硕':
                $ext = "zs";
                break;
            case '学硕':
                $ext = "xs";
                break;
            default:
                $ext = "bs";
                break;
        }
        // $template = APP_PATH . 'Admin/View/Review/template_' . $ext . '.docx';
        $template = APP_PATH . 'Admin/View/Review/template.docx';
       
        //实例化PHPWORD
        $templateProcessor = new TemplateProcessor($template);
        $checked = unicode_decode('\u25a0', 'UTF-8', true, '\u', '');       //选中
        $unChecked = unicode_decode('\u25a1', 'UTF-8', true, '\u', '');     //未选中

        //写入系统时间
        // $templateProcessor->setValue("time", date("Y-m-d H:i"));
        
      

        // //写入学生信息
        // $templateProcessor->setValue("name", $expertView['student__name']);
        // $templateProcessor->setValue("student_no", $expertView['student_no']);
        // $templateProcessor->setValue("admission_date", $expertView['admission_date']);
        // $templateProcessor->setValue("subject_major", $expertView['subject_major']);
        // $templateProcessor->setValue("secret", $expertView['secret']);
        // $templateProcessor->setValue("research_direction", $expertView['research_direction']);
        // $templateProcessor->setValue("title", $expertView['title']);
        // $templateProcessor->setValue("innovation_point", $expertView['innovation_point']);

        // //写入评阅详情信息
        // // $templateProcessor->cloneRow('num', count($reviewDetailViews));
        // $scoreSum = 0;
        // foreach($reviewDetailViews as $key => $reviewDetailView)
        // {
        //     $num = (string)($key + 1);
        //     $templateProcessor->setValue('num#' . $num, $num);
        //     $templateProcessor->setValue('review_title#' . $num, $reviewDetailView['title']);
        //     $templateProcessor->setValue('review_factor#' . $num, $reviewDetailView['factor']);
        //     $scoreSum += $reviewDetailView['score'] * $reviewDetailView['proportion'] / 100;
        //     $templateProcessor->setValue('review_level#' . $num, $this->getLevelNumByScore($reviewDetailView['score']));
        // }
        
        // //总分四舍五入
        // $scoreSum = (int)floor($scoreSum + 0.5);
        // $levels = array("bad", "good", "better", "best");
        // $scoreLevel = $this->getLevelbyScore($scoreSum);
        // foreach($levels as $key => $level)
        // {
        //     if ($key === $scoreLevel)
        //     {
        //         $templateProcessor->setValue($level,$checked);
        //     }
        //     else
        //     {
        //         $templateProcessor->setValue($level,$unChecked);
        //     }
        // }
        
        // //写入详阅详情 评阅意见 评阅时间
        // $templateProcessor->setValue("review_suggestion", $reviewDetailOther['suggestion']);
        // $templateProcessor->setValue("expert_name", $expertView['name']);
        // $templateProcessor->setValue("expert_school", $expertView['school']);
        // $templateProcessor->setValue("date", date("Y年m月d日", $reviewDetailOther['time']));

        // //写入 答辩 意见
        // $defenseConfigs = $this->getDefenseConfigs();
        // foreach($defenseConfigs as $key => $defenseConfig)
        // {
        //     if ($key == $reviewDetailOther['defense'])
        //     {
        //         $templateProcessor->setValue("d" . $key, $checked);
        //     }
        //     else
        //     {
        //         $templateProcessor->setValue("d" . $key, $unChecked);
        //     }
        // }

        // //写入熟悉程度
        // for($i = 0; $i < 3; $i++)
        // {
        //     $tag = $unChecked;
        //     if ($i == $reviewDetailOther['familiar'])
        //     {
        //         $tag = $checked;
        //     }
        //     $templateProcessor->setValue("f" . $i, $tag);
        // }

        // //写入推荐意见
        // for($i = 0; $i < 3; $i++)
        // {
        //     $tag = $unChecked;
        //     if ($i == $reviewDetailOther['excellent'])
        //     {
        //         $tag = $checked;
        //     }
        //     $templateProcessor->setValue("e" . $i, $tag); 
        // }

        // //写入 专家技术职称 信息
        // for($i = 0; $i < 2; $i++)
        // {
        //     $tag = $unChecked;
        //     if ($i == $expertView['job_title'])
        //     {
        //         $tag = $checked;
        //     }
        //     $templateProcessor->setValue("j" . $i, $tag);
        // }

        // //写入 专家导师类别 信息
        // for($i = 0; $i < 2; $i++)
        // {
        //     $tag = $unChecked;
        //     if ($i == $expertView['tutor_class'])
        //     {
        //         $tag = $checked;
        //     }
        //     $templateProcessor->setValue("t" . $i, $tag);
         
        // }

        // 保存文件
        $templateProcessor->saveAs($saveFile);

        //返回文件路径及文件名
        $return['saveFile'] = $saveFile;
        $return['fileName'] = $saveName;
        return $return;
    }

    /**
     * 生成传入周期ID的评阅表excel数据。
     * @return lists 带有表头的数据
     * panjie
     * 2016.03
     */
    public function createExcelDatas($cycleId)
    {
        //取当前周期专家信息
        $ExpertViewL = new ExpertViewLogic();
        $experts = $ExpertViewL->getReviewdListsByCycleId($cycleId);
        if ($experts === false)
        {
            $this->setError("ExpertViewL error:" . $ExpertViewL->getError());
            return false;
        }

        //取出评阅设置信息
        $ReviewL = new ReviewLogic();
        $reviews = $ReviewL->getAllLists();

        $datas = array();
        $i = 0;

        //拼接header头信息(前)
        $datas[$i] = array(
                "作者",
                "学号",
                "论文题目",
                "评审专家",
                "email",
                "电话",
                "职称",
                "导师类别",
                "专长",
                "学科",
                "联系地址",
                "学校"
                    );

        //拼接header头信息(中)
        foreach($reviews as $key => $review)
        {
            array_push($datas[$i], $review['title'] . '(' . $review['proportion'] . '%)');
        }

        //拼接header头信息(后)
        $datas[$i][] = "综合分";
        $datas[$i][] = "评审结果";
        $datas[$i][] = "答辩意见";

        //依次取出当前专家评阅详情信息，并进行拼接。
        $ReviewDetailViewL = new ReviewDetailViewLogic();
        $ReviewDetailOtherLogic = new ReviewDetailOtherLogic();
        $defenseConfigs = $this->getDefenseConfigs();   //答辩配置
        foreach($experts as $key => $expert)
        {
            $i ++;

            //计算前置数据
            $datas[$i][] = $expert['student__name'];
            $datas[$i][] = $expert['student_no'];
            $datas[$i][] = $expert['title'];
            $datas[$i][] = $expert['name'];
            $datas[$i][] = $expert['email'];
            $datas[$i][] = $expert['phone'];
            $datas[$i][] = $expert['job_title'] == '0' ? "正高级" : "副高级";
            $datas[$i][] = $expert['tutor_class'] == '0' ? "硕导" : "博导";
            $datas[$i][] = $expert['specialty'];
            $datas[$i][] = $expert['subject'];
            $datas[$i][] = $expert['address'];
            $datas[$i][] = $expert['school'];

            $reviewDetails = $ReviewDetailViewL->getListsByExpertId($expert['id']);
            $sumScore = 0.0;                            //设置总分
            change_key($reviewDetails, 'review__id');

            //依次按评阅设置取出相应的分值,添加到数据中部
            //优点：当前评阅设置下取值，不会发生数据为空的错误
            //缺点：当评阅项目改变后，不能取出正确的数值。即：无法查看历史论文评论信息
            foreach($reviews as $review)
            {
                $score = (int)$reviewDetails[$review['id']]['score'];
                $datas[$i][] =  (string)$score;
                $sumScore += $score * (int)$review['proportion'];
            }
            $sumScore = (int)floor($sumScore / 100 + 0.5);
            $datas[$i][] = (string)$sumScore;

            //取论文等级
            $level = $this->getLevelInfoByScore($sumScore);
            $datas[$i][] = $level['detail'];

            //取答辩意见
            $reviewDetailOther = $ReviewDetailOtherLogic->getListByExpertId($expert['id']);
            $datas[$i][] = $defenseConfigs[$reviewDetailOther['defense']] === null ? "数据异常" : $defenseConfigs[$reviewDetailOther['defense']];
        }
        return $datas;
    }
}
