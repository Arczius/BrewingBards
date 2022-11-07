<div class="block">
    <h3>Voeg studenten toe</h3>
    <p>Kopieer en plak een klassen lijst vanuit {Its learning?}</p>
    <br>

    <form action="<?php echo base_url(); ?>/Mod/StudentCreateController/CreateUsers" method="post" class="form--accent form--rounded">

        <div>
            <textarea name="text" id="" cols="30" rows="10" placeholder="Voer hier uw lijst in..."></textarea>
        </div>
        <div>
            <input type="hidden" name="class" value="<?php echo $HoldID ?>" class="form-control">
        </div>

        <div>
            <br>
            <button type="submit" class="btn_success">Voeg studenten toe</button>
        </div>
    </form>
</div>