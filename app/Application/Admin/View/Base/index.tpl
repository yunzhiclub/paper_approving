<!DOCTYPE html>
<html>

<head>
    <include file="Base/head" />
</head>

<body>
    <block name="wrapper">
        <div id="wrapper">
            {$YZ_TEMPLATE_NAV}
            <include file="Base/body" />
            <div id="footer" style="clear:both;display:block">
                <block name="footer">
                <hr />
                    <p style="text-align: center;">
                    &copy;<?php echo date("Y"); ?>&nbsp;<a target="_blank" href="http://clxy.hebut.edu.cn">河北工业大学材料科学与工程学院</a>&nbsp;&nbsp;&nbsp;&nbsp;<br />技术支持:<a target="_blank" href="http://www.yunzhi.club" alt="河北工业大学梦云智软件开发团队">河北工业大学梦云智软件开发团队</a>
                    </p>
                </block>
            </div>
        </div>
        <!--/#wrapper-->
        <include file="Base/footer" />
    </block>
</body>

</html>
