<div class="col-xs-12">
    <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title col-xs-6">
                    <span class="glyphicon glyphicon-th-list"></span>
                    &nbsp; ตารางข้อมูลพนักงาน                			</h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo base_url('admin_management/doctor_form');?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="เพิ่มใหม่">
                        <i class="glyphicon glyphicon-plus"></i> <span class="hidden-xs hidden-sm">เพิ่มใหม่</span>
                    </a>
                </div>
                <div class="box-header col-xs-12 " style=" margin: 10px;">
                    <div class="box-tools pull-right">
                        <i class="btn btn-sm btn-success">
                            <i class="glyphicon glyphicon-plus"></i>
                        </i>
                        <span class="text-muted">&nbsp;เพิ่มข้อมูล</span> &nbsp;&nbsp;

                        <i class="btn btn-sm btn-primary">
                            <i class="fa fa- fa-pencil"></i>
                        </i>
                        <span class="text-muted">&nbsp;แก้ไขข้อมูล</span>&nbsp;&nbsp;
                        <i class="btn btn-sm btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </i>
                        <span class="text-muted">&nbsp;ลบข้อมูล</span>
                    </div>
                </div>
            </div>
        <div class="box-body">
            <div class="col-xs-12"> <br/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <a href="<?php echo base_url('admin/view_data');?>" class="btn btn-sm btn-success"  data-toggle="tooltip" data-placement="top" title="ดูข้อมูล"><i class="glyphicon  glyphicon-plus"></i></a>
                            <a href="<?php echo base_url('#');?>" class="btn btn-sm btn-primary"  data-toggle="tooltip" data-placement="top" title="แก้ไข"><i class="fa fa- fa-pencil"></i></a>
                            <a href="<?php echo base_url('#');?>" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"><i class="glyphicon glyphicon-trash"></i></a>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>