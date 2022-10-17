<div class="block">
    <h3>Bewerk klas</h3>
    
    <br>
    <form class="form--main form--rounded" action="<?php echo base_url(); ?>/Mod/UpdateClassController/UpdateClass" method="post">
    <div>
            <input type="text" name="className" value="<?php echo $HoldID["Name"] ?>"></input>
        </div>
    <div>
        <input type="hidden" name="classID" value="<?php echo $HoldID["ID"] ?>">
    </div>
    <div>
        <br>
        <button class="btn_success" type="submit">Bewerk de klas</button>
    </div>
    </form>
</div>