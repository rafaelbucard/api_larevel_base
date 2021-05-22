<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('sytem/booststrap.css')}}">
    <link rel="stylesheet" href="{{asset('sytem/style.css')}}">
    <title>Login - DFC</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="http://dreamsfinances.com/assets/img/DreamsCapital-Forex.png" id="icon" alt="User Icon" />
          </div>
      
          <!-- Login Form -->
          <form>
            <input type="email" id="login" class="fadeIn second" name="email" placeholder="digite seu email cadastrado">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="sua senha">
            <input type="submit" class="fadeIn fourth bg-success" value="Entra">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="/register">Cadastra</a>
          </div>
      
        </div>
    <script src="{{asset('sytem/jquery.js')}}"></script>
    <script src="{{asset('sytem/bootstrap.js')}}"></script>
</body>
</html>