<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ asset('css/adminLogin.css') }}" rel="stylesheet">

    <style>
      img {
        border-radius: 50%;
        width: 150px;
        height: 150px;

        display: block;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
    <h1 style="text-align:center; color:red; font-family: Ravie;">Wecome Admin</h1>
    <img  src=" {{ asset('img').'/'.'img_avatar.png' }} " alt="">
    
    <form method="post" action="index.html" class="login">

        <p>
          <label for="login">Email:</label>
          <input type="text" name="login" id="login" value="name@example.com">
        </p>

        <p>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" value="4815162342">
        </p>

        <p class="login-submit">
          <button type="submit" class="login-button">Login</button>
        </p>

        <p class="forgot-password"><a href="index.html">Forgot your password?</a></p>
      </form>

  </body>
</html>
