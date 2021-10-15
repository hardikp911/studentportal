<?php

session_start();

// print_r($_SESSION);

include("conn.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $prn = $_POST['prn'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    

  
 $err = array();

 if(empty($name)){
    $err[] = "Enter your name";
}

if(empty($prn)){
    $err[] = "Enter your prn";
}

if(empty($email)){
    $err[] = "Enter your email";
}

if(!is_numeric($phone)){
    $err[] = "Enter your phone";

}


if(empty($err)){

    // $qry = "INSERT INTO login  VALUES (null, '$name', '$prn', '$email','$phone');";

    // mysqli_query($connection,$qry);

    // echo '<script>location.replace("../temp/index.php")</script>';
}
    // $qry = 
}

if(isset($_POST["LoginSumbit"])){

  $prn =  mysqli_real_escape_string($connection, $_POST['prn']);
  $name = mysqli_real_escape_string($connection, $_POST['name']);



  
 $err = array();

 if(empty($name)){
    $err[] = "Enter your name";
    // die();
}

if(empty($prn) || is_numeric($phone)){
    $err[] = "Enter your prn";
}



// If result matched $myusername and $mypassword, table row must be 1 row


if(empty($err)){
  //echo $username.'<br>'.$password;
  $query = "SELECT * FROM `user` WHERE `prn`= '$prn'  AND `name`= '$name' limit 1 ";
  $res = mysqli_query($connection,$query);
  $ress = mysqli_fetch_array($res,MYSQLI_ASSOC);

  $count = mysqli_num_rows($res);


  if ($count == 1) {

    $_SESSION['aid'] = $ress["id"];
    
    if($ress["type"] == "t"){
      $_SESSION["t"] = $name;
      $_SESSION["type"] = 't';

    }

    if($ress["type"] == "s"){
      $_SESSION["s"] = $name;
      $_SESSION["type"] = 's';


    }

    echo '<script>location.replace("dash.php")</script>';      
    }else{
      $err[] = 'Wrong Credencials';
    }
}
}


// print_r($err);


?>

 


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:200,400,700,900'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:300,400'>
<link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://static.fontawesome.com/css/fontawesome-app.css'>
 <style>
        *,
        *::before,
        *::after {
        box-sizing: border-box;
        }

        html {
        font-size: 62.5%;
        }

        body {
          background-image: url("res/mit-pune1.jpg");
          background-size: cover;
          background-position: center;
         /* height: 100vh; */
        font-size: 1.6rem;
        font-weight: 200;
        font-family: "Montserrat", sans-serif;
        /* min-height: 100vh; */
        }

        .main-page {
        display: flex;
        flex: 1;
        align-items: stretch;
        justify-content: space-between;
        height: 100vh;
        overflow: hidden;
        }

        .form {
        padding: 4rem 0;
        border-style: solid;
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
        width: 45rem;
        }
        .form__legend {
        text-align: center;
        padding: 0 0.5rem;
        }
        .form__body {
        display: flex;
        flex-direction: column;
        align-items: center;
        }
        .form__group {
        display: flex;
        flex: 1;
        justify-content: space-between;
        align-items: center;
        }
        .form__input {
        display: block;
        width: 100%;
        max-width: 45rem;
        background-color: #EEF5F3;
        border: none;
        outline: none;
        height: 5rem;
        border-radius: 2rem;
        padding: 0 1.5rem;
        transition: background 0.3s;
        color: #88908E;
        font-size: 1.8rem;
        margin-bottom: 2rem;
        }
        .form__input-half {
        display: inline-block;
        width: 48.5%;
        }
        .form__input-checkbox:checked {
        filter: invert(100%) hue-rotate(118deg) brightness(1.2);
        }
        .form__input::placeholder {
        font-size: 1.6rem;
        font-weight: 400;
        font-family: inherit;
        opacity: 0.75;
        }
        .form__input:focus, .form__inputactive {
        background: #FFFFFF;
        border: 1px solid #E1EAE7;
        }

        .switch {
        z-index: 100;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #28B498;
        padding: 0 2rem;
        color: #FFFFFF;
        }
        .switch__header {
        margin-bottom: 4rem;
        }
        .switch__text-container {
        text-align: center;
        }

        .login, .signup {
        display: flex;
        opacity: 1;
        flex-basis: 0;
        flex-shrink: 1;
        flex-grow: 1;
        padding: 2rem 4rem;
        flex-direction: column;
        align-items: center;
        overflow-Y: auto;
        }
        .login__header, .signup__header {
        margin-bottom: 0;
        }
        .login__byline, .signup__byline {
        margin-bottom: 4rem;
        }

        .social-media__container {
        display: flex;
        flex-direction: row;
        flex: 1;
        align-items: center;
        justify-content: center;
        margin-bottom: 4rem;
        }
        .social-media__icon:not(:last-child) {
        margin-right: 1rem;
        }

        .header {
        text-align: center;
        font-weight: 200;
        }

        .icon {
        cursor: pointer;
        }

        .btn {
        width: 23.5rem;
        min-height: 5.5rem;
        background-color: #28B498;
        border-radius: 3rem;
        outline: 0;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color:aliceblue;
        font-family: "Raleway", sans-serif;
        font-size: 1.8rem;
        line-height: 2rem;
        text-align: center;
        margin: 3.2rem 0;
        transition: 0.3s;
        }
        .btn:hover, .btn:active {
        background-color: #2dc9aa;
        }
        .btn-white {
        background-color: #FFFFFF;
        color: black;
        box-shadow: 0 12px 24px rgba(34, 51, 49, 0.13);
        }
        .btn-white:hover, .btn-white:active {
        background-color: #FFFFFF;
        color: #28B498;
        box-shadow: none;
        }

        .hide-view {
        opacity: 0;
        flex-basis: 0;
        flex-shrink: 1;
        flex-grow: 0.000001;
        overflow: hidden;
        padding: 0;
        margin: 0;
        }

        .signup.hide-view {
        transform: translateX(-50vw);
        }

        .login.hide-view {
        transform: translateX(50vw);
        }

        .smooth {
        transition: transform 0.3s linear, opacity 0.3s ease-in-out, flex-grow 0.9s cubic-bezier(0.19, 1, 0.22, 1);
        }
</style>


</head>
<body>
<!-- partial:index.partial.html -->
<div class="main-page">

  <div class="smooth login" id="login">
  <h1 class="login__header header" style="color: #FFFFFF;">Welcome back to MIT-WPU</h1>
  <p class="login__byline"style="color: #FFFFFF;">It's good to see you again</p>
  <!-- <div class="social-media__container">
    <span class="fa-stack fa-lg social-media__icon icon">
    <i class="fas fa-circle fa-stack-2x" style="color: #48556D;"></i>
    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
    </span>  
     <span class="fa-stack fa-lg social-media__icon icon">
    <i class="fas fa-circle fa-stack-2x" style="color: #DF4D3B;"></i>
    <i class="fab fa-google-plus-g fa-stack-1x fa-inverse"></i>
    </span>   
    <span class="fa-stack fa-lg social-media__icon icon">
    <i class="fas fa-circle fa-stack-2x" style="color: #48556D;"></i>
    <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
    </span>
  </div> -->
  <fieldset class="form" >
    <legend class="form__legend"style="color: #FFFFFF;"><h3>PLEASE LOGIN IN</h3></legend>
  <form action="" class="form__body form-login" method="POST">  
      <?php foreach($err as $e) {echo '<div style="color:red">'.$e . '</div><br>';} ?>
    <input class="form__input" type="number" name="prn" placeholder="prn">
    <input class="form__input" type="text" name="name" placeholder="name">   
     <button class="btn" type="submit"  name="LoginSumbit" value="login">Sign in</button>
      
  </form>  
    </fieldset>
</div>

  <div class="switch">
  <div class="switch__text-container"  id="switch-text">
    <h2 class="switch__header header">please check your details</h2>
    <!-- <p>Sign up and discover what we can do for you</p> -->
  </div>
   <button class="btn-white btn" id="switch-button">Forget Prn</button>
</div>
  
    <div class="smooth signup hide-view" id="signup">
  <h1 class="signup__header header"style="color: #FFFFFF;">Forget Something!</h1>
  <p class="signup__byline"></p>
  <!-- <div class="social-media__container">
    <span class="fa-stack fa-lg social-media__icon icon">
    <i class="fas fa-circle fa-stack-2x" style="color: #48556D;"></i>
    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
    </span>  
     <span class="fa-stack fa-lg social-media__icon icon">
    <i class="fas fa-circle fa-stack-2x" style="color: #DF4D3B;"></i>
    <i class="fab fa-google-plus-g fa-stack-1x fa-inverse"></i>
    </span>   
    <span class="fa-stack fa-lg social-media__icon icon">
    <i class="fas fa-circle fa-stack-2x" style="color: #48556D;"></i>
    <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
    </span>
  </div> -->
  <fieldset class="form">
    <legend class="form__legend"style="color: #FFFFFF;"><h3> PLEASE ENTER DETAILS </h3></legend>

    <!-- <form action="" class="form__body form-login" method="POST">   -->
      <?php foreach($err as $e) {echo '<div style="color:red">'.$e . '</div><br>';} ?>
      <input class="form__input" type="text" name="name" placeholder="name">   
      <input class="form__input" type="phone" name="phone" placeholder="phone">   

    <!-- <input class="form__input" type="number" name="prn" placeholder="prn"> -->

    <input class="form__input" type="email" name="email" placeholder="email">   
     <button class="btn center" type="submit"  name="Sumbit" value="login">show prn</button>
      
  </form>  











  <!-- <form action="" class="form__body form-login" method="POST">
    <div class="input__group">
        <input class="form__input form__input-half" type="text" name ="name" placeholder="name">
        <input class="form__input form__input-half" type="number" name = "prn" placeholder="prn">
    </div>
    <div class="input__group">
       <input class="form__input form__input-half" type="email" name = "email" placeholder="email">
       <input class="form__input form__input-half" type="number" name ="phone" placeholder="phone">      
    </div>
   
     <button class="btn" name ="submit" type="submit">Sign up</button> 
  </form>   -->
    <!-- <form action="" method="POST" class="form__body form-login"> 
    <?php foreach($err as $e) {echo '<div style="color:red">'.$e . '</div><br>';} ?>


              <div  class="input__group">
/                <input type="text" class="form__input form__input-half"    name="name">
              </div> -->
              <!-- <div  class="input__group">
            <label for="prn">prn</label>
            <input type="number"  class="form__input form__input-half" name="prn">
            </div> -->
            <!-- <div  class="input__group">
/            <input type="number"  class="form__input form__input-half" name="phone">
            </div>
            <div class="form-group">
/            <input type="email"  class="form__input form__input-half"  name="email">
            </div>
              <input type="submit" class="btn btn-primary" name="submit"></input>
            </form> -->
    </fieldset>
</div>
  
</div>
<!-- partial -->
  <script> 
const login = document.getElementById('login');
const signup = document.getElementById('signup');

const showText = {
  login : {
    header : 'Not yet a member?',
    byline : 'Sign up and discover what we can do for you',
    buttonText: 'Sign up'
  },
  
  signup : {
    header : 'Already a member?',
    byline : 'Sign in and see what\'s new since your last visit',
    buttonText: 'Sign in'    
  }
}
const switchButton = document.getElementById('switch-button');
const switchText =  document.getElementById('switch-text');

switchButton.addEventListener('click', () => {
  login.classList.toggle('hide-view');
  signup.classList.toggle('hide-view');
  login.classList.contains('hide-view') ? changeSwitchText('signup') : changeSwitchText('login')
})

function changeSwitchText(el){
  switchText.children[0].innerText = showText[el].header;
  switchText.children[1].innerText = showText[el].byline;
  switchButton.innerText = showText[el].buttonText;
}</script>

</body>
</html>
