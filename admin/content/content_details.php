<?php
    $page_title = "Content Detail";
    require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");

    if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
    {
        $id = $_GET["q"];
        $content = get_content_by_passing_id($id);
    }

    if(isset($_POST["approve"]))
    {
        unblock_content($id);
        current_page("q=$id");
    }

    if(isset($_POST["disapprove"]))
    {
        block_content($id);
        current_page("q=$id");
    }
?>

<div class="container mt-3" id="user_details">
    <div class="row g-0">
        <div class="card col-md-10 offset-md-1">
            <div class="card-header">
                Detail
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $content["img"]; ?>" class="img-thumbnail mx-5" alt="Cover Image">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <p class="h5 mb-3"><?php echo $content["title"]; ?></p>
                                <?php 
                                    $id = $content["user_id"];
                                    $writer = get_user_details_by_passing_id($id);
                                ?>
                                <p class="mb-3">~<?php echo $writer["user_name"]; ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body m-3">
                       
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mx-5"><?php echo $content["content"]; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <?php if($content["block"] == '0'): ?>
                                    
                                    <form role="form" action="<?php echo action_form("q=".$content["content_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger mx-5" id="disapprove" name="disapprove">Disapprove</button>
                                    </form>
                                    <a href="/admin/content/all_content_list" class="btn btn-primary mx-5">Close</a>
                                
                                <?php else: ?>
                                    <form role="form" action="<?php echo action_form("q=".$content["content_id"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-success mx-5" id="approve" name="approve">Approve</button>
                                    </form>
                                    <a href="/admin/content/disapprove_content_list" class="btn btn-primary mx-5">Close</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/footer.php");
?>