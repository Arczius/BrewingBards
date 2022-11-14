<div class="block">
    <h3>Wachtwoord veranderen</h3>
    <br>

    <form id="basic-form" action="<?php echo base_url(); ?>/PasswordEditingController/changePassword" method="post" class="form form--rounded">

        <div>
            <label for="oldPassword">Oud wachtwoord</label><br>
            <input type="text" class="form-control" name="oldPassword" placeholder="Voer oud wachtwoord in">
            <b><span class="error color-main"><?php echo $errorMessages[0];?></span></b><br><br>

            <label for="newPassword">Nieuw wachtwoord</label><br>
            <input type="text" class="form-control" name="newPassword" placeholder="Voer nieuw wachtwoord in" required>
            <b><span class="error color-main"><?php echo $errorMessages[1];?></span></b><br><br>
            
            <label for="repeatNewPassword">Herhaal nieuw wachtwoord</label><br>
            <input type="text" class="form-control" name="repeatNewPassword" placeholder="Herhaal nieuw wachtwoord">
            <b><span class="error color-main"><?php echo $errorMessages[2];?></span></b>
        </div>

        <div>
            <br>
            <button type="submit" class="btn_success">Aanpassen</button>
        </div>
    </form>
</div>