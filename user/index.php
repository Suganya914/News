<?php 
$page_title="User DashBoard";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/user/nav.php");
$user=get_user_details_by_id();
?>
<div class="container my-5" id="user_detail">
  <div class="row mb-5">
    <div class="col-md-2">
      <img  src="<?php echo $user["img"]; ?>" alt="Writer Photo" class="img mb-3" id="user" width="100"style="border-radius: 50%;">
    </div>
    <div class="col-md-6 mb-3">
      <div class="col-mb-4 mb-3 mt-2 h3"><?php echo $user["user_name"]; ?></div>
      <p class="mb-3"><?php echo $user["description"]; ?></p>

     
      
    </div>
  </div>
  

  <ul class="row" id="content_previous_option">
    <li class="h4 content col-md-1 justify_content_start">
        <input type="radio" name="writer_radio" id="content" value="0" checked>
        <label for="content">Content</label>
    </li>
    
  </ul>
  <hr>
  <?php
    

    $contents = get_user_content();
  ?>
  <div class="container">
    <div class="row" id="published_content">
      <div class="row">
        <?php if($contents): ?> <!--checking if content is there / not -->
          <?php foreach($contents as $content): ?> <!-- separating group of data into single data-->
            <div class="col-md-3">
              <?php
                $id = $content["content_id"]; 
                
              ?>
              <div class="card h-100">
                <div class="card-body">
                  
                  <a href="/News/user/display_content?q=<?php echo $id; ?>" class="text-decoration-none text-dark">
                    <img class="card-img-top img-fluid" src="<?php echo $content["img"]; ?>" alt="content">
                    <h5 class="card-title my-2"><?php echo $content["title"]; ?></h5>
                    <div class="row mb-3">
                      <div class="d-flex justify-content-between gap-2">
                        <?php echo substr($content['create_time'], 8, 2) . "-" . substr($content['create_time'], 5, 2) . "-" . substr($content['create_time'], 0, 4); ?>
                        <a href="/News/user/edit_content?q=<?php echo $id; ?>" class="btn btn-primary">
                          <span><i class="fa-solid fa-pen-to-square" id="edit content"></i></span>
                        </a>
                        <a href="/News/user/delete_content?q=<?php echo $id; ?>" class="btn btn-danger" id="delete_button" name="delete_button">
                          <span><i class="fa-solid fa-trash" id="delete_content"></i></span>
                        </a>
                      </div>
                    </div>
                    
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
   
          
      
    
  </div>
</div>
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/footer.php");
?>
</div>