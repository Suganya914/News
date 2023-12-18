<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="/News/assests/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/News/assests/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/News/assests/css/font-awesome.min.css">
    <script type="text/javascript" src="/News/assests/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php if (isset($page_title) && !empty($page_title)): ?>
		<title>
			<?php echo trim($page_title); ?> | Mumbai Times
		</title>
	<?php else: ?>
		<title>Mumbai Times</title>
	<?php endif; ?>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark ">
        <div class="container">
            <a href="/News/" class="navbar-brand">MUMBAI TIMES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <?php if(isset($_SESSION["user_id"]) && ($_SESSION["role"])): ?>
          <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
            <li class="nav-item me-4">
              <a class="nav-link" href="/News//explore/"><span>Explore</span></a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="/News/SignOut"><span>Logout</span></a>
            </li>
          </ul>
        <?php else: ?>
          <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
            <li class="nav-item me-4">
              <a class="nav-link" href="/News/explore/"><span>Explore</span></a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="/News/login"><span>Sign In</span></a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="/News/SignIn"><span>Register</span></a>
            </li>
          </ul>
        <?php endif; ?>
        </div>
        </div>
    </nav>  