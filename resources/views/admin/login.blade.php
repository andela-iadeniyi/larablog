<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Agriteer Admin Area</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <form class="form-signin" id="login_form" action="/admin/login" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label><input type="checkbox" value="remember-me"> Remember me</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->

    <script type="text/javascript">
    $(document).ready(function(){
        $("#login_form").submit(function(){
            $.post('/admin/login', $("#login_form").serialize(), function(e){
                if (e == 1) {
                    document.location.href = "/admin/home";
                } else {
                    alert('Invalid login details provided');
                }
            });

            return false;
        });
    });
    </script>
</body>
</html>
