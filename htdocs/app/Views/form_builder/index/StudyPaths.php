<div class="block">
    <a href="<?php echo base_url(); ?>/Mod/create_study_path" class="btn_default">Leerpad aanmaken</a>
    <a href="<?php echo base_url(); ?>/Mod/MakeQuestion" class="btn_default">Vragen aanmaken</a>
    <ul>
        <?php
        foreach ($StudyPaths as $StudyPath) {
        ?>

            <li>
                <a href="<?php echo base_url() ?>/Mod/form_builder/<?php echo $StudyPath['ID']; ?>">
                    <?php echo $StudyPath['Name']; ?>
                </a>
            </li>

        <?php
        }
        ?>
    </ul>
</div>