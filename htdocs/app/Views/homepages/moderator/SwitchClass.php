<div class="block">
    <h3>Naar welke klas zou <?php echo "'".$student["Name"]?> ' moeten gaan</h3>
    <br>

    <form class="form--accent form--rounded" action="<?php echo base_url(); ?>/Mod/SwitchClassController/SwitchStudent" method="post" class="form--accent form--rounded">

        <div>
            <input type="hidden" class="form-control" name="StudentID" value="<?php echo $student["ID"] ?>">
        </div>
        <select name="newClass" id="newClass">
            <option value="<?php echo $activeClass["ID"]?>"><?php echo $activeClass["Name"]?></option>
            <?php foreach($allClasses as $Class){?>
            <option value="<?php echo $Class["ID"]?>"><?php echo $Class["Name"]?></option>
            <?php }; ?>
        </select>
        <div>
            <br>
            <button type="submit" class="btn_success">Student naar klas sturen</button>
        </div>
    </form>
</div>