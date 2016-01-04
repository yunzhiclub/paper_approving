<?php if (!defined('THINK_PATH')) exit();?>
    <!-- start: Main Menu -->
    <div id="sidebar-left" class="span2">
        <div class="nav-collapse sidebar-nav">
            <block name="nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="<?php echo U('Template/index');?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                    <li><a href="<?php echo U('Template/messages');?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>
                    <li><a href="<?php echo U('Template/tasks');?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Tasks</span></a></li>
                    <li><a href="<?php echo U('Template/ui');?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
                    <li><a href="<?php echo U('Template/widgets');?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
                        <ul>
                            <li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
                            <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
                            <li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo U('Template/form');?>"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
                    <li><a href="<?php echo U('Template/chart');?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
                    <li><a href="<?php echo U('Template/typography');?>"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
                    <li><a href="<?php echo U('Template/gallery');?>"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
                    <li><a href="<?php echo U('Template/table');?>"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
                    <li><a href="<?php echo U('Template/calendar');?>"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
                    <li><a href="<?php echo U('Template/file-ma');?>.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
                    <li><a href="<?php echo U('Template/icon');?>"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
                    <li><a href="<?php echo U('Template/login');?>"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
                </ul>
            
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end: Main Menu -->
</block>