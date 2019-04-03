<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <form action="sistema.php" method="POST">
            <div class="container">
                <h1>Login</h1>
                <label for="vardas"><br>Vardas:</br></label>
                <input type="text" placeholder="Enter Username" name="vardas" required>
                <br>
                <label for="pavarde"><br>Pavarde:</br></label>
                <input type="text" placeholder="Enter Username" name="pavarde" required>
                <br>
                <label for="psw"><br>Slaptazodis:</br></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <input type="hidden" name="act" value="act"  > 
                <button type="submit"  name="reg_user" >Login</button>
            </div>

        </form>
    </body>
</html>
