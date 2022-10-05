<div class="block--accent">
    <h3>Naar welke klas zou <?php echo "'".$student["Name"]?> ' moeten gaan</h3>
    <br>
    <form action="<?php echo base_url(); ?>/ClassCreateController/SwitchStudent" method="post" class="form--accent form--rounded">
        <div>
            <input type="hidden" class="form-control" name="className" value="<?php echo $student["ID"] ?>">
        </div>
        <select name="color" id="color">
            <option value="<?php echo $activeClass["ID"]?>"><?php echo $activeClass["Name"]?></option>
            <?php foreach($allClasses as $Class){?>
            <option value="<?php echo $Class["ID"]?>"><?php echo $Class["Name"]?></option>
            <?php }; ?>
        </select>
        <div>
            <br>
            <button type="submit" class="btn_success">Aanmaken</button>
        </div>
    </form>
</div>