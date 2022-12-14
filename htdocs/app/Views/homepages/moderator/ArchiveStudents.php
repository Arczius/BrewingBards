<div class="block">
    <br>
    <br>
    <div class="table--dark table--rounded">

        <div class="table__item">
            <span class="table__item__col col-2">
                Studenten nummer
            </span>
            <span class="table__item__col col-2">
                Naam
            </span>
            <span class="table__item__col col-2">
                Mail
            </span>
            <span class="table__item__col col-2">
                Last Logged In
            </span>
            <span class="table__item__col col-1">
                Archiveren
            </span>
            <span class="table__item__col col-1">
                klas veranderen
            </span>
            <span class="table__item__col col-1">
                Aanpassen
            </span>
        </div>
        <?php
        foreach ($Students as $Student) {
        ?>

            <div class="table__item">
                <p class="table__item__col  col-2">
                    <?php echo $Student["SchoolUserName"]; ?>
                </p>
                <p class="table__item__col  col-2">
                    <?php echo $Student["Name"]; ?>
                </p>
                <p class="table__item__col  col-2">
                    <?php echo $Student["Mail"]; ?>
                </p>
                <p class="table__item__col  col-2">
                    <?php 
                    if($Student["TimeLastLoggedIn"] == "0000-00-00 00:00:00"){
                        echo "nooit ingelogged";
                    }else{
                       echo $Student["TimeLastLoggedIn"];  
                    }                    
                    ?>
                </p>                
                <a href="<?php echo base_url(); ?>/Mod/DeArchive/<?php echo $Student["ID"] ?>" class="table__item__col col-1 link-item"><i class='bx bxs-box'></i></a>
                <a href="<?php echo base_url(); ?>/Mod/SwitchClass/<?php echo $Student["ID"] ?>" class="table__item__col col-1 link-item"><i class='bx bx-shuffle'></i></a>
                <a href="<?php echo base_url(); ?>/Mod/StudentEdit/<?php echo $Student["ID"] ?>" class="table__item__col col-1 link-item"><i class='bx bx-edit-alt'></i></a>
            </div>

        <?php
        }
        ?>
    </div>
</div>