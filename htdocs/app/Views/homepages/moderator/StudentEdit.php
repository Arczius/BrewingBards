<div class="block--accent">
    <h3>Voeg student toe</h3>
    <br>
    <form action="<?php echo base_url(); ?>/Mod/StudentEditController/UpdateUser" method="post" class="form--accent form--rounded">
        <div>
            <input type="text" name="name" value="<?php echo $HoldID["Name"] ?>"></input>
        </div>
        <div>
            <input type="text" name="schoolUserName" value="<?php echo $HoldID["SchoolUserName"] ?>"></input>
        </div>
        <div>
            <input type="hidden" name="userID" value="<?php echo $HoldID["ID"] ?>" class="form-control">
        </div>

        <div>
            <br>
            <button type="submit" class="btn_success">Pas studenten aan</button>
        </div>
    </form>
</div>