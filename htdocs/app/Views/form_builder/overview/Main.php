<div>
    <h2>
        <?php echo $StudyPath['Name']; ?>
    </h2>

    <div>
        <b>
            Verplicht: 
            <?php
            switch($StudyPath['Required']){
                case "0":
                    echo "Nee";
                    break;
                
                case "1":
                    echo "Ja";
                    break;

                default:
                    echo "er is iets fout gegaan";
            }
            ?>
        </b>
    </div>
</div>