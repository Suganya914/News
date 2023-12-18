<?php 
$page_title="Display News";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/user/nav.php");
if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    $content = get_content_by_passing_id($id);
}

?>
<div class="container my-5" id="user_detail">
  <div class="row mb-5">
    <h2><?php echo $content["title"]; ?></h2>
    <img src="<?php echo $content["img"]; ?>">
    <p><?php echo $content["content"]; ?> </p>
   
          
      
    
  </div>
</div>
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/footer.php");
?>
</div>