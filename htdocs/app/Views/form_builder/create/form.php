<div class="block">
    <h2>Leerpad aanmaken</h2>
    <br>
<form action="./create_study_path" class="form"method="post">
    <span>Naam:</span>
    <br>
    <input type="text" name="StudyPathName" class="col-2" placeholder="Naam van het leerpad">
    <br>
    <br>
    <label for="required">Verplicht?:</label>
    <br>
    <select name="required" class="col-2">
        <option value="true">ja</option>
        <option value="false">nee</option>
    </select>
    <br>
    <br>
    <input type="submit" class="btn_default" value="maak aan">
</form>
</div>
