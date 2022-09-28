<div class="container block">
    <h3>Moderator overzicht</h3>
    <br>
    <div class="table--special table--rounded">

        <div class="table__item">
            <h4 class="table__item__col adm-tbl-modname">Naam moderator:</h4>
            <div class="table__item__col"><b>E-mail adres:</b></div>
        </div>

        <?php foreach ($moderators as $moderator) {
        ?>
            <div class="table__item">
                <h4 class="table__item__col adm-tbl-modname"><?php echo $moderator['Name']; ?></h4>
                <a class="table__item__col link-item" href="mailto:<?php echo $moderator['Mail']; ?>"><?php echo $moderator['Mail']; ?></a>
            </div>
        <?php
        } ?>

    </div>
    
        <a class="btn_second" href="#">
            nieuwe moderator
        </a>
    
</div>