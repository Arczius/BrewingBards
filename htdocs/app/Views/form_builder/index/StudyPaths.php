<div>
    <?php
        foreach($StudyPaths as $StudyPath){
            ?>

            <div>
                <a href="<?php echo base_url() ?>/Mod/form_builder/<?php echo $StudyPath['ID']; ?>">
                    <?php echo $StudyPath['Name']; ?>
                </a>
            </div>
            
            <?php
        }
    ?>
</div>