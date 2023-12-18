<?php

    require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/init.php");
    
    if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"]) || !isset($_SESSION["role"]) || $_SESSION["role"] !== "user")
    {
		header("Location: /News/");
		exit(0);
	}
?>
<nav class="navbar navbar-expand-sm shadow bg-primary navbar-dark" id="user_nav">
  <div class="container">
    <a class="navbar-brand col-md-4 d-flex justify-content-end" href="/News/user/">
      <span class="fw-bold">Dashboard</span>
    </a>
    <div class="collapse navbar-collapse" id="nav-content">
      <ul class="navbar-nav">
        <li class="nav-item col-md-12 d-flex justify-content-end">
          <a class="nav-link" href="/News/user/add_content">
            <span class="fw-bold">Add content</span>
          </a>
        </li>
        
      </ul>
    </div>      
  </div>
</nav>