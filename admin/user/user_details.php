<?php 
$page_title="User Details";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");
if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    $user = get_user_details_by_passing_id($id);
}

?>
<div class="container my-5" id="admin_detail">
  <div class="row mb-5">
  <div class="card col-md-10 offset-md-1">
            <div class="card-header">
                Detail
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $user["img"]; ?>" class="img-thumbnail mx-5" alt="Profile Image">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <label class="h5">User Name: </label>
                                <p><?php echo $user["user_name"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body m-3">
                        <div class="row mb-5">
                            <div class="col-md-4">
                                <label for="fname" class="">First Name: </label>
                                <p class="h5" id="fname" name="fname"><?php echo $user['fname']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <label for="lname" class="">Last Name: </label>
                                <p class="h5" id="lname" name="lname"><?php echo $user['lname']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="">Email address: </label>
                                <p class="h5" id="email" name="email"><?php echo $user['email_address']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php
                                $id = $user["user_id"];
                                $contents = get_content_by_passing_user($id);
                            ?>
                            
                        </div>
                        <div class="mb-1">
                            <p class="h4">Content</p>
                        </div>
                        <hr class="mb-5">
                        <?php if($contents): ?>
                            <div class="row mb-5">
                                <?php foreach($contents as $content): ?>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <img class="card-img-top" src="<?php echo $content["img"] ?>" alt="content">
                                                <div class="card-title h5 my-2">
                                                    <div class="row">
                                                        <div class="d-flex justify-content-center">
                                                            <?php echo $content["title"]; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="card-text my-2">
                                                    <?php echo substr($content['create_time'],8,2)."-".substr($content['create_time'],5,2)."-".substr($content['create_time'],0,4); ?>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <a href="/News/admin/user/" class="btn btn-danger">Close</a>
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
</div>