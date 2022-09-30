<div class="block">
    <h3>overzicht Klas</h3>
    <br>
    <div class="table--dark table--rounded">

        <div class="table__item">
            <span class="table__item__col mod-tbl-classname">
                Studenten nummer
            </span>
            <span class="table__item__col mod-tbl-200">
                Naam
            </span>
            <span class="table__item__col mod-tbl-200">
                Mail
            </span>
            <span class="table__item__col mod-tbl-200">
                Aanpassen
            </span>
            <span class="table__item__col mod-tbl-200 grow-item">
                Verwijderen
            </span>
        </div>

        <?php
        foreach ($Students as $Student) {
        ?>

            <div class="table__item">
                <p class="table__item__col  mod-tbl-classname">
                   <?php echo $Student["SchoolUserName"]; ?>
                </p>
                <p class="table__item__col  mod-tbl-200">
                    <?php echo $Student["Name"]; ?>
                </p>
                <p class="table__item__col  mod-tbl-200">
                    <?php echo $Student["Mail"]; ?>
                </p>
                <a href="./StudentEdit/<?php echo $Student["ID"] ?>" class="table__item__col mod-tbl-200 link-item">&#x2b; Studenten Aanpassen</a>
            </div>

        <?php
        }
        ?>
    </div>
    <a href="./ClassCreate" class="btn_default">Klas toevoegen</a>
</div>