<?php
    $page_title = "Content";
    require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");
?>

<div class="container" id="genre">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card my-3">
                    <div class="card-header">
                        Content List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center table_heading">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($contents = get_content_all_details()): ?>
                                    <?php
                                        $number = 1;
                                        foreach($contents as $content):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $content['title']; ?></td>
                                        <td>
                                            <?php 
                                                $id = $content["user_id"];
                                                $writer = get_user_details_by_passing_id($id);
                                            ?>
                                            <?php echo $writer["email_address"]; ?>
                                        </td>
                                        
                                        <td>
                                            <a href="/News/admin/content/content_details?q=<?php echo $content["content_id"]; ?>" class="btn btn-sm btn-primary mx-auto d-block col-md-12" id="detail" name="detail"><span class="fa-solid fa-circle-info"></span> Detail</a>
                                        </td>
                                    </tr>
                                    <?php
                                        $number += 1;
                                        endforeach;
                                    ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
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