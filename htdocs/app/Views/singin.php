<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url() ?>/style/style.css">
    <title>Social Tavern | Login</title>
  </head>
  <body>
    <header class="block--info txt_cntr">
        <h3>Welkom op Social Tavern</h3>
        <p>Log in om verder te gaan</p>
    </header>
    <div >
        <div class=" block">
            <div class="col-5 centered">
                <br>
                <h2 class="txt_cntr">Inloggen</h2>
                <br>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form class="form--main" action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <div class="form-group mb-3">
                        <input type="email" name="Mail" placeholder="Email" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="Password" placeholder="Password" class="form-control" >
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn_info">Log in</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>
  </body>
</html>