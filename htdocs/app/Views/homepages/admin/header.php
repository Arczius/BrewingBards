<header class="block--main">
    <h3>Welkom <?php echo $user['Name'] ?></h3>
    <p class="half-block">Ingelogd als Admin</p><a class="float-right rev" href="<?php echo base_url(); ?>/logout">Uitloggen</a>
    <br> <br>
    <a class="rev" href="<?php echo base_url(); ?>/ChangePassword" ><i class='bx bx-left-arrow'></i>Wachtwoord veranderen</a>
    <a class="rev" href="javascript:void(0)" onclick="history.back()"><i class='bx bx-left-arrow'></i> Ga terug</a>
</header>