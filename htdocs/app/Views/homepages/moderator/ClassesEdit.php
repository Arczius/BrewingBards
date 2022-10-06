<div>
    <h3>Bewerk klas</h3>
    <br>
    <form action="<?php echo base_url(); ?>/UpdateClassController/updateClass" method="post">
    <div>
            <input type="text" name="className" value="<?php echo $HoldID["Name"] ?>"></input>
        </div>
    <div>
        <input type="hidden" name="classID" value="<?php echo $HoldID["ID"] ?>">
    </div>
    <div>
        <br>
        <button type="submit">Bewerk de klas</button>
    </div>
    </form>
</div>