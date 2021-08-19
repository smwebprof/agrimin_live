<div class="row">   
    <div class="col-lg-12">
        <div> 
            <strong>Last Updated :</strong>  <?php print date(DATE_FORMAT_SIMPLE,$getInfo['created_date']);?>   
            <strong>Author :</strong>  <?php print $getInfo['name'];?> 
        </div>
        <?php print $getInfo['description'];?>
    </div>
</div>