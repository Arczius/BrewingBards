<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url() ?>/style/style.css">
    <title>Social Tavern | Login</title>
  </head>
  <body>
    <header class="block--info txt_cntr">
        <h3>Wachtwoord vergeten</h3>
        <p>kom op zeg je hebt een mail gekregen waar die in staat.</p>
    </header>
    <div class=" block">
        <div class="col-5 centered">
            <p>Voer je mailadress in zodat je een mail met een nieuw wachtwoord</p>
            <form class="form--main" action="<?php echo base_url(); ?>/ForgotPasswordController/forgotChangePassword" method="post">
                <div class="form-group mb-3">
                    <label for="Mail">Voer hier je Mailadress in.</label>
                    <input type="email" name="Mail" placeholder="Email" class="form-control" >  
                    <input type="text" name="ID" value="<?php echo $ID?>">                  
                </div>               
                <div class="d-grid">
                    <button type="submit" class="btn btn_info">send mail</button>
                </div>     
            </form>
        </div>
    </div>
  </body>
</html>