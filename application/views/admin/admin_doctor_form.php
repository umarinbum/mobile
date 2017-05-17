<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title col-xs-6">
                <span class="glyphicon glyphicon-th-list"></span>
                &nbsp; เพิ่มข้อมูล</h3>

            <div class="box-tools pull-right">
                <a href="<?php echo base_url('admin_management/doctor'); ?>" class="btn btn-sm btn-default" data-toggle="tooltip"
                   data-placement="top" title="" data-original-title="ยกเลิก">
                    <i class="fa  fa-mail-reply"></i> <span class="hidden-xs hidden-sm">ยกเลิก</span>
                </a>
            </div>

        <div  class="col-md-6 col-md-offset-3" >
        <form role="form">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-xs-12 ">
                    <label for="exampleInputEmail1">ชื่อ - สกุล แพทย์</label>
                        </div>
                    <div class="col-xs-12 row">
                    <div class="col-xs-6">
                    <input type="text" class="form-control " name="first_name"  placeholder="ชื่อ">
                    </div>
                    <div class="col-xs-6">
                    <input type="text" class="form-control " name="last_name" placeholder="สกุล"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>