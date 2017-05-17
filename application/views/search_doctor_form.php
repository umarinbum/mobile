<?php $this->load->view('header');?>

    <div class="container text-center box_title_header">
        <div class="line_behind_h1 bck_grey"></div>
        <h1 class="header_h1 text-center title_color mar0 bck_white">นัดหมายแพทย์</h1>
    </div>

    <div class="container">
        <div class="col-xs-8 col-xs-offset-2">
            <?php $this->load->view('template/search_doctor_template'); ?>
        </div>
    </div>

<?php $this->load->view('footer');?>