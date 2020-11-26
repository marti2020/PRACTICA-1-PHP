<?php
    //echo $_POST["user"];
    //echo "<br>";
    //echo $_POST["pass"];
    //echo USUARIS[1]."\n";
    //echo password_hash("Fatality!", PASSWORD_DEFAULT)."\n";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        require_once "users.php";
        $usuari=base64_decode($_POST["usersec"]);
        $contra=base64_decode($_POST["passsec"]);
        
        for($i=0;$i<sizeof(USUARIS);$i++)
        {
            if($usuari==USUARIS[$i]){
                if(password_verify($contra, PASS[$i]))
                {
                    header("Location: https://educem.com");
                }
            }
            else $error=true;
        }
    }
        
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>FORMULARI PRACTICA 1</title>
    <style>
            .login-page {
            width: 50%;
            padding: 8% 0 0;
            margin: auto;
            }
        
            .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 100%;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            }
            .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
            }
            .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
            }
            .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
            }
            .form .message a {
            color: #4CAF50;
            text-decoration: none;
            }
            .form .register-form {
            display: none;
            }
            .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
            }
            .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
            }
            .container .info {
            margin: 50px auto;
            text-align: center;
            }
            .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
            }
            .container .info span {
            color: #4d4d4d;
            font-size: 12px;
            }
            .container .info span a {
            color: #000000;
            text-decoration: none;
            }
            .container .info span .fa {
            color: #EF3B3A;
            }
            body {
            background: #76b852; /* fallback for old browsers */
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;      
            }
            @media only screen and (max-width: 1024px) {
                .login-page {
                    width: 80%;
                    padding: 8% 0 0;
                    margin: auto;
                }
            } 
      </style>
      </head>
        
        <body>
            <div class="login-page">
                <div class="form">
                    <?php
                        if(isset($error)) echo "<script>alert('USUARI I CONTRASENYA INCORRECTES')</script>";
                    ?>
                  <form class="login-form" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" onsubmit="return base64()" method="post">
                    <input type="email" id="user" name="user" placeholder="username"/>
                    <input type="password" id="pass" name="pass" placeholder="password"/>
                    <input type="hidden" id="usersec" name="usersec"/>
                    <input type="hidden" id="passsec" name="passsec"/>
                    <button>login</button>
                  </form>
                  <button class="button">Recuperar contrasenya</button>
                </div>
              </div>
            <script>
                function base64(){
                document.getElementById('usersec').value=btoa(document.getElementById('user').value);
                document.getElementById('passsec').value=btoa(document.getElementById('pass').value);
                return true;
                }
            </script>
        </body>
        
    </html>