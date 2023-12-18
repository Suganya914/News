<?php 
$page_title="Add News";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/user/nav.php");

if(isset($_POST["publish"]))
{
    add_content($_POST);
    current_page();
}
?>

<div class="container col-md-6 shadow rounded mb-3 border mt-4" id="add_content">
    <?php error_message(); ?>
    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-4 mt-3">
            <div class="col-md-3">
                <div class="card shadow border align-items-center justify-content-center mb-3" id="card1">
                    <img src="" class="img-thumbnail" id="display_image">
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="title" class="h5">Title</label>
                    </div>
                    <div class="col-md">
                        <input type="text" class="form-control shadow mb-0 border" id="title" name="title" required>
                    </div>
                </div>
                
                    
                <div class="row mb-3">
                    
                    <div class="col-md-6">
                        <label for="image" class="h5">Add/Edit Image</label>
                        <input type="file" class="form-control" name="image" id="image" onchange="updateImage(this)" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <textarea class="form-control shadow rounded border" rows="12" id="content" name="content" required></textarea>
            </div>
        </div>
        <div class="col-md text-end">
            <button type="sumbit" class="btn btn-primary mb-3" id="publish" name="publish">
                Publish
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('image');
            const displayImage = document.getElementById('display_image');
            const imageDataInput = document.getElementById('image');

            imageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        displayImage.src = event.target.result;
                        displayImage.style.display = 'block';
                        imageDataInput.value = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
</script>