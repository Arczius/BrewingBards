<div>
    <?php 
    foreach($classes as $class){
        ?>
        <div>
            <a href="./classes/<?php echo $class['ID'] ?>">
                <?php echo $class['Name']; ?> 
            </a>
            <a href="./StudentCreate">Studenten toevoegen</a>
        </div>

        <?php
    }
    ?> 
    <a href="./ClassCreate">Klas toevoegen</a>
</div>