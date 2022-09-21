<div>
    <?php 
    foreach($classes as $class){
        ?>
        <div>
            <a href="./classes/<?php echo $class['ID'] ?>">
                <?php echo $class['Name']; ?> 
            </a>
        </div>

        <?php
    }
    ?> 
</div>