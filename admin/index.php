<?php 
$page_title="Admin DashBoard";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");

?>
<div class="container my-5" id="admin_detail">
  <div class="row mb-5">
    <h2>Welcome Admin</h2>
    <div class="row">
    <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center h3 fw-bold">User</p>
                                <i class="fas fa-user-edit h1 d-flex justify-content-center"></i>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $user_count = user_count();
                                ?>
                                <div class="data d-flex align-items-center justify-content-center h1 fw-bold my-4">
                                    <?php echo $user_count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center h3 fw-bold">Content</p>
                                <i class="fa fa-scroll h1 d-flex justify-content-center"></i>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $content_count = content_count();
                                ?>
                                <div class="data d-flex align-items-center justify-content-center h1 fw-bold my-4">
                                    <?php echo $content_count; ?>
                                </div>
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