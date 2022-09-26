<?php
    helper('classLengthReader');
?>
<div class="block">
    <h3>Klassen overzicht</h3>
    <br>
    <div class="table--dark table--rounded">

        <div class="table__item">
            <span class="table__item__col mod-tbl-classname">
                Klasnaam
            </span>
            <span class="table__item__col mod-tbl-classname">
                studentenaantal
            </span>
            <span class="table__item__col"></span>
        </div>



        <?php
        foreach ($classes as $class) {
        ?>
            <div class="table__item">
                <a href="./classes/<?php echo $class['ID'] ?>" class="table__item__col link-item mod-tbl-classname">
                    &#9432; <?php echo $class['Name']; ?>
                </a>
                <span class="table__item__col">
                    <?php echo classLengthReader($class['ID']); ?>
                </span>
                <a href="./StudentCreate/<?php echo $class['ID'] ?>" class="table__item__col link-item">&#x2b; Studenten toevoegen</a>
            </div>

        <?php
        }
        ?>
    </div>
    <a href="./ClassCreate" class="btn_default">Klas toevoegen</a>
</div>