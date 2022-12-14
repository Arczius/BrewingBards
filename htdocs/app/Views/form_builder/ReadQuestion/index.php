<a href="<?php echo base_url() ?>/Mod/MakeQuestion">maak nieuwe vraag</a>
<ul>

    <?php
foreach($questions as $question){
    ?>
    <li>
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
