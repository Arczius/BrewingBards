<div class="block">
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