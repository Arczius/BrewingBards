<div class="container block">
    <h3>Moderator overzicht</h3>
    <br>
    <div class="table--special table--rounded">

        <div class="table__item">
            <h4 class="table__item__col adm-tbl-modname">Naam moderator:</h4>
            <div class="table__item__col adm-tbl-short"><b>Afkorting:</b></div>
            <div class="table__item__col adm-tbl-mail"><b>E-mail adres:</b></div>
        </div>

        <?php foreach ($moderators as $moderator) {
        ?>
            <div class="table__item">
                <h4 class="table__item__col adm-tbl-modname"><?php echo $moderator['Name']; ?></h4>
                <a class="table__item__col adm-tbl-short "><?php echo $moderator['SchoolUserName']; ?></a>
                <a class="table__item__col adm-tbl-mail" href="mailto:<?php echo $moderator['Mail']; ?>"><?php echo $moderator['Mail']; ?></a>
                <span class="table__item__col grow-item"></span>
                <a class="table__item__col link-item txt_right col-1" href="<?php echo base_url() . '/Admin/editModerator/' . $moderator['ID'];?>">Aanpassen</a>
                <a class="table__item__col link-item txt_right col-1" href="<?php echo base_url() . '/Admin/deleteModerator/' . $moderator['ID'];?>">Verwijder</a>
            </div>
        <?php
        } ?>

    </div>
    
        <a class="btn_second" href="./createModPage">
            nieuwe moderator
        </a>
    
</div>