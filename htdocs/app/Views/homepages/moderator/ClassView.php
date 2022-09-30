<div class="block">
    <h3>overzicht Klas</h3>
    <br>
    <div class="table--dark table--rounded">

        <div class="table__item">
            <span class="table__item__col mod-tbl-classname">
                Studenten nummer
            </span>
            <span class="table__item__col">
                Naam
            </span>
            <span class="table__item__col">
                Mail
            </span>
            <span class="table__item__col">
                Aanpassen
            </span>
            <span class="table__item__col">
                Verwijderen
            </span>
        </div>

        <?php
        foreach ($Students as $Student) {
        ?>

            <div class="table__item">
                <p class="table__item__col link-item mod-tbl-classname">
                   <?php echo $Student["SchoolUserName"]; ?>
                </p>
                <p class="table__item__col link-item mod-tbl-classname">
                    <?php echo $Student["Name"]; ?>
                </p>
                <p class="table__item__col link-item mod-tbl-classname">
                    <?php echo $Student["Mail"]; ?>
                </p>
                <a href="./StudentEdit/<?php echo $Student["ID"] ?>" class="table__item__col link-item">&#x2b; Studenten Aanpassen</a>
            </div>

        <?php
        }
        ?>
    </div>
    <a href="./ClassCreate" class="btn_default">Klas toevoegen</a>
</div>