<?php
$this->load->view('admin/layout/header_app.php');
?>
<div class="row">
    <div class="col-lg-12">
        <h2>CodeIgniter Create PDF with MySQL Example</h2>                 
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <a href="<?php site_url();?>generate-pdf-file" target="_blank" class="pull-right btn btn-primary btn-xs" style="margin: 2px;"><i class="fa fa-plus"></i> Create PDF File</a> 
        <a href="#" class="pull-right btn btn-info btn-xs" style="margin: 2px;"><i class="fa fa-mail-reply"></i> Back To Tutorial</a>               
    </div>
</div>
<hr>
<div class="row">   
        <div class="col-lg-12">
            <div> 
                <strong>Last Updated :</strong>  <?php print date(DATE_FORMAT_SIMPLE,$getInfo['created_date']);?>   
                <strong>Author :</strong>  <?php print $getInfo['name'];?> 
            </div>
            <?php print $getInfo['description'];?>
</div>
 
</div><!-- /.row -->
<hr>
<div class="row">
    <div class="col-lg-12">
        <a href="<?php site_url();?>generate-pdf-file" target="_blank" class="pull-right btn btn-primary btn-xs" style="margin: 2px;"><i class="fa fa-plus"></i> Create PDF File</a> 
        <a href="#" class="pull-right btn btn-info btn-xs" style="margin: 2px;"><i class="fa fa-mail-reply"></i> Back To Tutorial</a>               
    </div>
</div>
<?php
$this->load->view('admin/layout/footer_app.php');
?>