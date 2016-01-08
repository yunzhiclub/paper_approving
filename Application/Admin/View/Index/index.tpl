<extend name="Base:index" />
<block name="body">
    <form id="form" action="{:U('save')}" method="post">
        <html:editor id="ueditor" type="Ueditor">
            <H1>HEELO</H1>
        </html:editor>
        <div class="row">
            <div class="col-xs-6">
                
                <table id="filetest_table" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th width="80%">附件</th>
                        <th width="20%">大小</th>
                    </tr>
                </table>
                <html:uploader value="value" name="filetest" debug="true" type="file">
                    请选择图片
                </html:uploader>
            </div>
        </div>
        <button type="submit">submit</button>
    </form>
</block>
