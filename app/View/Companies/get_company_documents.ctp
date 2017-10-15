<div class="animated-thumbnails">
<?php
    foreach ($documents['CompanyDocument'] as $field=>$document) {
    if($document!=''){ ?>
    
    <a href="<?php echo SITE_URL?>img/company_files/<?php echo $owner_id.'/'.$document?>">
        <img src="<?php echo SITE_URL?>img/company_files/<?php echo $owner_id.'/'.$document?>" class="galleryImages">
    </a>
<?php }} ?>
</div>
<script type="text/javascript">
function setGallery(){
    $('.animated-thumbnails').lightGallery({
        thumbnail:true,
        animateThumb: true,
        showThumbByDefault: true,
        toggleThumb: true,
        fullScreen: false
    });
}
   
</script>