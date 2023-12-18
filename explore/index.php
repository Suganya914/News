<?php 
$page_title="Explore Page";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/init.php");

?>
<div class="container mt-4" id="explorer_list">
    <div class="row">
        <?php $contents=get_all_content(); ?> 
        <?php if($contents): ?>
            <?php foreach($contents as $content): ?>
                <div class="row">
                    <a href="/News/explore/display_content?q=<?php echo $content["content_id"]; ?>" class="text-decoration-none text-dark" >
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"><img src="<?php echo $content["img"]; ?>" class="img" id="explorer_image"></div>
                                    <div class="col-md-8">
                                        <div class="card-title h3 my-5">
                                        <?php echo $content["title"]; ?>
                                        <?php $user_id=$content["user_id"]; 
                                        $user=get_user_details_by_passing_id($user_id); ?>
                                        </div>
                                        <div class="card-text">
                                           <?php echo $user["user_name"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a> 
                </div>
            <?php endforeach; ?> 
        <?php endif; ?>
    </div>
</div>

<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/footer.php");
?>