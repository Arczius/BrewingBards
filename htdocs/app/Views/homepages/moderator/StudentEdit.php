<div class="block">
    <h3>Voeg student toe</h3>
    <br>
    <form action="<?php echo base_url(); ?>/AllStudentFeaturesController/UpdatenUsers" method="post" class="form form--rounded">
        <div>
            <input type="text" name="name" value="<?php echo $HoldID["Name"] ?>"></input>
        </div>
        <br>
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