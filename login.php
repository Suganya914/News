<?php 
$page_title="LogIn";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/init.php");

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) && is_numeric($_SESSION["user_id"]) && isset($_SESSION["role"]))
{
    echo "<script>window.location='/News/".$_SESSION["role"]."';</script>";
    exit(0);
}

if(isset($_POST["login"]))
{
    signin($_POST);
    current_page();
}
?>

<div class="container">
        <div class="card col-md-4 offset-md-4 shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <div class="form">
                <?php error_message(); ?>
                <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <h3 class="text-center"> Login</h3></div>
                <div class="mb-4">
                 <input type="email" class="form-control" placeholder="Email" id="email_address" name="email_address" required>
                </div>
                <div class="mb-4">
                 <input type="password" class="form-control" placeholder="Passward" id="password" name="password" required>
                </div>
                <div class=" d-grid mb-4">
                    <button class="btn btn-primary" id="login" name="login" type="submit">Login</button>
                </div>
                <div class="text-center">
                <a href="" class="text-decoration-none">Create an account</a></div></form>
            </div>
        </div>
        </div>
        </div>
<?php require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/footer.php");?>