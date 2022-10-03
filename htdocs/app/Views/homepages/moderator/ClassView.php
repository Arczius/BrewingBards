<div class="block">
    <h3>overzicht Klas</h3>
    <a href="<?php echo base_url(); ?>/AddSingleStudent/<?php echo $classId ?>">Voeg Student Toe</a>
    <br>
    <div class="table--dark table--rounded">

        <div class="table__item">
            <span class="table__item__col col-2">
                Studenten nummer
            </span>
            <span class="table__item__col col-3">
                Naam
            </span>
            <span class="table__item__col col-3">
                Mail
            </span>
            <span class="table__item__col col-2">
                Aanpassen
            </span>
            <span class="table__item__col col-2 grow-item">
                Verwijderen
            </span>
        </div>

        <?php
        foreach ($Students as $Student) {
        ?>

            <div class="table__item">
                <p class="table__item__col  col-2">
                   <?php echo $Student["SchoolUserName"]; ?>
                </p>
                <p class="table__item__col  col-3">
                    <?php echo $Student["Name"]; ?>
                </p>
                <p class="table__item__col  col-3">
                    <?php echo $Student["Mail"]; ?>
                </p>
                <a href="<?php echo base_url(); ?>/StudentEdit/<?php echo $Student["ID"] ?>" class="table__item__col mod-tbl-200 link-item">&#x2b; Studenten Aanpassen</a>
                <a href="<?php echo base_url(); ?>/StudentDelete/<?php echo $Student["ID"] ?>" class="table__item__col mod-tbl-200 link-item">&#x2d; Studenten Verwijderen</a>
            </div>

        <?php
        }
        ?>
    </div>
    <a href="./ClassCreate" class="btn_default">Klas toevoegen</a>
</div>