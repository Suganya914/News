<?php
   function encrypt_pwd($string)
   {
       return sha1($string);
   }

   function action_form($query="")
   {
       $query = $query === "" ? $query : "?$query";
       return preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"])) . $query;
   }

   function current_page($query="")
   {
       echo "<script>window.location='".preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"]))."?$query';</script>";
       exit(0);
   }
   
   function error_message()
   {
       require_once($_SERVER["DOCUMENT_ROOT"]."/News/error_message.php");
   }

   function signin($data)
   {
       global $db;
       extract($data);
       $email_address = htmlspecialchars(trim($email_address));
       $password = encrypt_pwd($password);

       $sql = "SELECT user_id, role FROM user WHERE email_address = :email_address AND password = :password AND block = '0'";
       $stmt = $db->prepare($sql);
       $stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
       $stmt->bindParam(':password',$password, PDO::PARAM_STR);

       if($stmt->execute())
       {
           if($stmt->rowCount() > 0)
           {
               $result = $stmt->fetch(PDO::FETCH_ASSOC);
               $_SESSION["user_id"] = $result["user_id"];
               $_SESSION["role"] = $result["role"];
               return true;
           }
       }
       $_SESSION["error_messages"][] = "Invalid Login";
       return false;
   }

   function registration($data)
   {
       global $db;
       extract($data);
       $email_address = htmlspecialchars(trim($email_address));
       $user_name = trim($user_name);

       if (filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
           $_SESSION["error_messages"][] = "Invalid Email Address";
       }

       if ($password != $conf_pass) {
           $_SESSION["error_messages"][] = "Password and Confirm password are not matching";
       }

       if (!isset($_SESSION["error_messages"])) {
           $password = encrypt_pwd($password);
           $unique_id = rand(time(), 1000);
           $image = isset($_FILES['image']) ? upload_file($_FILES['image'], "C:/xampp/htdocs/News/assests/images/profile photo/", ["jpg", "jpeg", "png"]) : "";
           $image = substr($image, 15);
           $sql = "INSERT INTO user(fname, lname, user_name, email_address, password, img) VALUES (:fname, :lname, :user_name, :email_address, :password, :image)";
           $stmt = $db->prepare($sql);
           $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
           $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
           $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
           $stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
           $stmt->bindParam(':password', $password, PDO::PARAM_STR);
           $stmt->bindParam(':image', $image, PDO::PARAM_STR);

           if ($stmt->execute()) {
               $_SESSION["success_messages"][] = "Successfully Registered";
               return true;
           }

           return false;
       }

       return false;
   }
   function get_user_details_by_id()
	{
		global $db;
		$user_id = $_SESSION["user_id"];
		$sql = "SELECT * FROM user WHERE user_id = :user_id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

   function upload_file($file, $targetDirectory, $allowedExtensions) {
    $fileName = basename($file["name"]);
    $targetFile = $targetDirectory . $fileName;
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  
    if (!in_array($fileExtension, $allowedExtensions)) {
      return ""; 
    }

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
      return $targetFile;
    }
  
    return "";
}

function add_content($data){
    global $db;
    extract($data);
    $user_id= $_SESSION["user_id"];
    $image = isset($_FILES['image']) ? upload_file($_FILES['image'], "C:/xampp/htdocs/News/assests/images/content img/", ["jpg", "jpeg", "png"]) : "";
    $image = substr($image, 15);
    $sql ="INSERT INTO content(user_id,title,img,content) VALUES (:user_id, :title, :image, :content)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam('image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
    if($stmt->execute()){
        $_SESSION["success_message"][]="Successfully added";
        return true;
    }
    $_SESSION["error_message"][]="Failed to add";
    return false;

}
function get_user_content(){
    global $db;
    $user_id= $_SESSION["user_id"];
    $sql ="SELECT * FROM content WHERE user_id=:user_id AND block='0'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    return false;
} 
function get_content_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE content_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}
    function get_content_by_passing_user($id)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}
    function edit_content($data,$content_id){
    global $db;
    extract ($data);
    $image = isset($_FILES['image']) ? upload_file($_FILES['image'], "C:/xampp/htdocs/News/assests/images/content img/", ["jpg", "jpeg", "png"]) : "";
    if ($image){$image = substr($image, 15); 
        $sql = "UPDATE content SET title=:title, img=:image, content=:content WHERE content_id=:content_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':content_id',$content_id, PDO::PARAM_INT);
        $stmt->bindParam(':title',$title, PDO::PARAM_STR);
        $stmt->bindParam(':image',$image, PDO::PARAM_STR);
        $stmt->bindParam(':content',$content, PDO::PARAM_STR);
        if ($stmt-> execute()){
            $_SESSION["success_message"][]="Successfully Updated";
            return true;
        }
        $_SESSION["error_message"][]="Failed to update";
        return false;
        }
    } 
    function delete_content($content_id){
        global $db;
        $sql = "UPDATE content SET block='1' WHERE content_id=:content_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':content_id',$content_id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
        return false;
     }
    function get_all_content(){
        global $db;
        $sql = "SELECT * FROM content WHERE block = '0'";
        $stmt = $db->prepare($sql);
        if($stmt-> execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    function get_user_details_by_passing_id($user_id){
        global $db;
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt -> bindparam(":user_id", $user_id , PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } 
        return false;              
        
    }
    function get_user_all_details(){
        global $db;
        $sql = "SELECT * FROM user";
        $stmt = $db->prepare($sql);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    function block_user($user_id, $block){
        global $db;
        $sql = "UPDATE user SET block = :block, modified_time = NOW() WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":user_id",$user_id, PDO::PARAM_INT);
        $stmt->bindParam(":block",$block, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $_SESSION["success_message"][]="Successfully Updated";
            return true;
            }
        $_SESSION["error_message"][]="Fail to Update";
        return false;
    }
    function verified_user($user_id, $verified){
        global $db;
        $sql = "UPDATE user SET verified = :verified, verified_time = NOW() WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":user_id",$user_id, PDO::PARAM_INT);
        $stmt->bindParam(":verified",$verified, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $_SESSION["success_message"][]="Successfully Updated";
            return true;
            }
        $_SESSION["error_message"][]="Fail to Update";
        return false;
    }
    function role_update($user_id, $role){
        global $db;
        $sql = "UPDATE user SET role = :role, modified_time = NOW() WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":user_id",$user_id, PDO::PARAM_INT);
        $stmt->bindParam(":role",$role, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $_SESSION["success_message"][]="Successfully Updated";
            return true;
            }
        $_SESSION["error_message"][]="Fail to Update";
        return false;
    }
    function get_content_all_details(){
        global $db;
        $sql = "SELECT * FROM content";
        $stmt = $db->prepare($sql);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    function block_content($content_id){
        global $db;
        $sql = "UPDATE content SET block='1' WHERE content_id=:content_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':content_id',$content_id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    function unblock_content($content_id){
        global $db;
        $sql = "UPDATE content SET block='0' WHERE content_id=:content_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':content_id',$content_id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    function user_count(){
        global $db;
        $sql = "SELECT COUNT(user_id) AS count FROM user";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
            $result=$stmt->fetch (PDO::FETCH_ASSOC);
            return (int) $result['count'];
        }
        return false;

    }
    function content_count(){
        global $db;
        $sql = "SELECT COUNT(content_id) AS count FROM content";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
            $result=$stmt->fetch (PDO::FETCH_ASSOC);
            return (int) $result['count'];
        }
        return false;

    }
?>