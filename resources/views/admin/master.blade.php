<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Area @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
  a{
    text-decoration: none;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Blog</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/admin/home">Home</a></li>
        <li><a href="/admin/menu">Menu Manager</a></li>
        <li><a href="/admin/content">Content Manager</a></li>
        <li><a href="/admin/register">Register User</a></li>
        <li><a href="/admin/settings">Account Settings</a></li>
        <li><a href="/admin/logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    @yield('content')
</div>

  <script src="http://blog.agriteer.com/assets/js/tinymce/jquery.tinymce.min.js"></script>
  <script src="../assets/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>

