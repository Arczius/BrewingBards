<h1><?= $leerpad["Name"] ?></h1>
<form action="<?php echo base_url() ?>/Mod/LinkQuestion" method="post">
    <input type="hidden" name="Studypath" value="<?= $leerpad["ID"] ?>">
    <select id="Question" name="Question">
    <?php foreach($questions as $question){ ?>
    <option value="<?= $question["ID"] ?>"><?= $question["title"] ?></option>
    <?php };?>
    </select>
    <button type="submit">Add</button>
</form>
<?php
if(!$LinkedQuestions){
?>
<p>Deze leerpad heeft nog geen vragen</p>
<?php
}
else{
?>

    <ul>

    <?php
foreach($LinkedQuestions as $question){
    ?>
    <li>
    <div>
        <a href="<?php echo base_url()?>/Mod/RemoveLinkedQuestion/<?=$question["ID"]?>/<?=$leerpad["ID"]?>" class="btn_default">Remove</a>
    </div>
    <h3>
        <?php
        echo $question['title'];
            if($question['required']){
                echo "*";
            }
        ?>
    </h3>
    <div>
        <?php echo $question['description'] ?>
    </div>
    <?php
    switch($question['type']){
        case 'textarea':
            ?>
            <textarea name="<?php echo $question['title'] . "-" . $question['ID'];?>" cols="30" rows="10"
            <?php if($question['required']){
                echo "required";
            } ?>
            ></textarea>
            <?php
            break;
        case 'text-input':
            ?>
            <input type="text" name="<?php echo $question['title'] . "-" . $question['ID']; ?>
            <?php if($question['required']){
                echo "required";
            } ?>
            ">
            <?php
            break;

        default:
            ?>
            <h1>something went wrong generating this question, please contact support</h1>
            <?php
    }

    ?>
    </li>
    <?php
}
?>

</ul>
<?php
}
?>