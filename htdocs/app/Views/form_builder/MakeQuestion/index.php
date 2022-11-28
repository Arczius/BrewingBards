
<form action="<?php echo base_url() ?>/Mod/MakeQuestion" method="post">
    <div>
        <label for="name">Naam:</label>
        <input type="text" placeholder="Naam" name="title" required>
    </div>
    <div>
        <label for="description">Omschrijving:</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10" required></textarea>
    </div>
    <div>
        <label for="type">Type:</label>
        <select name="type">
            <option value="textarea">memoblok</option>
            <option value="text-input" required>tekstblok</option>
        </select>
    </div>
    <div>
        <label for="required">Verplicht:</label>
        <input type="checkbox" name="required">
    </div>

    <input type="submit">
</form>
