<?php
helper('classLengthReader');
?>
<div class="block">
    <h3>Klassen overzicht</h3>
    <br>
    <div class="table--dark table--rounded">

        <div class="table__item">
            <span class="table__item__col col-3">
                Klasnaam
            </span>
            <span class="table__item__col col-1 link-item tooltip">
                Aantal <i class='bx bx-info-circle'></i>
                <span class="tooltiptext">Studenten aantal</span>
            </span>
            <span class="table__item__col grow-item">Voeg studenten toe</span>
            <span class="table__item__col grow-item">Aanpassen</span>
            <span class="table__item__col grow-item">Verwijderen</span>
        </div>



        <?php
        foreach ($classes as $class) {
        ?>
            <div class="table__item">
                <a href="<?php echo base_url(); ?>/classes/<?php echo $class['ID'] ?>" class="table__item__col link-item col-3">
                    <i class='bx bxs-show'></i> <?php echo $class['Name']; ?>
                </a>


                <span class="table__item__col col-1">
                    <?php echo classLengthReader($class['ID']); ?>
                </span>

                <a href="<?php echo base_url(); ?>/StudentCreate/<?php echo $class['ID'] ?>" class="table__item__col link-item grow-item"><i class='bx bx-user-plus'></i> Studenten toevoegen</a>
                <a href="<?php echo base_url(); ?>/DeleteClass/<?php echo $class['ID'] ?>" class="table__item__col link-item grow-item"><i class='bx bx-user-plus'></i> Verwijderen</a>
            </div>

        <?php
        }
        ?>
    </div>
    <a href="<?php echo base_url(); ?>/ClassCreate" class="btn_default">Klas toevoegen</a>
</div>