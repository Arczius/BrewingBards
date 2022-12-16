<div class="block">
    <h3>Moderater account aanpassen</h3>
    <br>
<form action="<?php echo base_url(); ?>/updateModAccount" method="post" class="form--main">
    <input type="text" name="UserName"  value='<?php echo $moderator["Name"]?>'>
    <br><br>
    <input type="email" name="Mail" value="<?php echo $moderator["Mail"]?>">
    <br><br>
    <input type="hidden" name="ID" value="<?php echo $moderator["ID"]?>">
    <input type="submit" value="Submit" class="btn_success">
</form>
</div>