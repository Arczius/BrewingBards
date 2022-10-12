<div class="block">
    <h3>Nieuwe klas aanmaken</h3>
    <br>
    <form action="<?php echo base_url(); ?>/ClassCreateController/CreateClass" method="post" class="form form--rounded">
        <div>
            <input type="text" class="form-control" name="className" placeholder="Voer een naam in">

        </div>

        <div>
            <br>
            <button type="submit" class="btn_success">Aanmaken</button>
        </div>
    </form>
</div>