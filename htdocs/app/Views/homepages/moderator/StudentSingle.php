<div class="block--accent">
    <h3>Voeg student toe</h3>
    <p>voer hier de gegevens van de leerling in die aangemaakt moet worden.</p>
    <br>
    <form action="<?php echo base_url(); ?>/AddSingleStudentController/CreateUser" method="post" class="form--accent form--rounded">
        <div>
            <input name="Name" placeholder="Naam" class="form-control">
        </div>
        <div>
            <input name="StudentUserName" placeholder="LeerlingNummer" class="form-control">
        </div>
        <div>
            <input type="hidden" name="Class" value="<?php echo $HoldID ?>" class="form-control">
        </div>

        <div>
            <br>
            <button type="submit" class="btn_success">Voeg student toe</button>
        </div>
    </form>
</div>