<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update caracter</title>
</head>
<body>
    <h1>update character</h1>
    <form action="<?php echo base_url(); ?>/user/UpdateCharacter/<?php echo $character["CharacterId"]; ?>" method="post">
        <label for="CharacterName">Character Name:</label>
        <input type="text" name="CharacterName" value="<?php $character["CharacterName"]; ?>" placeholder="<?php echo $character["CharacterName"]; ?>">
        <br><br>
        <label for="RaceName">Character Race: </label>
        <select name="CharacterRace">
            <?php foreach ($allRaces as $Races){ ?>
                <option value="<?php echo $Races["RaceName"]; ?>"><?php echo $Races["RaceName"]; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="CharacterClass">Character Class: </label>
        <select name="CharacterClass">
            <?php foreach ($allClasses as $Classes){ ?>
                <option value="<?php echo $Classes["ClassName"]; ?>"><?php echo $Classes["ClassName"]; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" value="Aanmaken" class="btn_info">
    </form>
</body>
</html>