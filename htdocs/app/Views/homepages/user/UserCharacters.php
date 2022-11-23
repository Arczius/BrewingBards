


<div class="block--main-info col-12 no-pad-top txt_right">
    <a href="JavaScript:Void(0)" class="btn_default modal-btn" data-modal="modal-character-create">Karakter toevoegen</a>
</div>

<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-warning">
       <?= session()->getFlashdata('msg') ?>
    </div>
<?php endif;?>

<!-- flex holder -->
<div class="block--main-info block--flex">



    <!-- card item -->
    <?php foreach ($characters as $character){ ?>
    <?php if($character["CharacterActivity"] ==  true) { ?> 
    <div class="block--main-info  border--rounded border--dark col-38 char-card">
        <div class="col-12 border-bottom--dark">
            <?php if($character["CharacterActivity"] ==  true) { ?> 
            <i class='bx ico-h2 switch-btn' data-toggle="true" data-name="Activity-<?php echo $character["CharacterId"]?>" onclick="ChangeActivity(<?php echo $character["CharacterId"]?>)"></i>
            <?php } else{ ?>
            <i class='bx ico-h2 switch-btn' data-toggle="false" data-name="Activity-<?php echo $character["CharacterId"]?>" onclick="ChangeActivity(<?php echo $character["CharacterId"]?>)"></i>
            <?php } ?> 
        </div>
        
        <br>
        <div class="col-2 float-right txt_right">
            <a href="" class="ico-h2 alt-dark tooltip">
                <i class='bx bxs-pencil '></i>
                <span class="tooltiptext">Aanpassen</span>
            </a>
            <br>
            <a href="" class="ico-h2 alt-dark tooltip">
                <i class='bx bxs-trash'></i>
                <span class="tooltiptext">Verwijderen</span>
            </a>
            <br>
            <a href="" class="ico-h2 alt-dark tooltip">
                <i class='bx bx-download'></i>
                <span class="tooltiptext--bottom">Downloaden</span>
            </a>
        </div>
        <div class="col-10 char-card__header">
            <h1><?php echo $character["CharacterName"] ?></h1>
            <h2><?php  echo $character['CharacterRace']?> | <?php echo $character['CharacterClass'] ?> </h2>
        </div>
        <br>
        <div class="col-10 border-top--dark char-card__icons">
            <a href="" class="ico-h1 tooltip">
                <i class='bx bxs-castle'></i>
                <i class='bx bxs-help-circle alert-icon--red'></i>
                <span class="tooltiptext--bottom">Voorbeeld Leerpad</span>
            </a>
            <a href="" class="ico-h1 tooltip">
                <i class='bx bxs-cog'></i>
                <i class='bx bxs-error-circle alert-icon--yellow'></i>
                <span class="tooltiptext--bottom">Tweede voorbeeld</span>
            </a>
            <a href="" class="ico-h1 tooltip">
                <i class='bx bxs-flask'></i>
                <i class='bx bxs-check-circle alert-icon--green'></i>
                <span class="tooltiptext--bottom">Derde voorbeeld</span>
            </a>
        </div>
    </div>
    <?php } else{ ?>      

    <!-- card item DISABLED-->
    <div class="block--disabled border--rounded border--disabled col-38 char-card">
        <div class="col-12 border-bottom--disabled">
            <?php if($character["CharacterActivity"] ==  true) { ?> 
            <i class='bx ico-h2 switch-btn' data-toggle="true" data-name="Activity-<?php echo $character["CharacterId"]?>" onclick="ChangeActivity(<?php echo $character["CharacterId"]?>)"></i>
            <?php } else{ ?>
            <i class='bx ico-h2 switch-btn' data-toggle="false" data-name="Activity-<?php echo $character["CharacterId"]?>" onclick="ChangeActivity(<?php echo $character["CharacterId"]?>)"></i>
            <?php } ?> 
        </div>
        <br>
        <div class="col-2 float-right txt_right">
            <a href="" class="ico-h2 tooltip">
                <i class='bx bxs-pencil'></i>
                <span class="tooltiptext">Aanpassen</span>
            </a>
            <br>
            <a href="" class="ico-h2 tooltip">
                <i class='bx bxs-trash'></i>
                <span class="tooltiptext">Verwijderen</span>
            </a>
            <br>
            <a href="" class="ico-h2 tooltip">
                <i class='bx bx-download'></i>
                <span class="tooltiptext--bottom">Downloaden</span>
            </a>
        </div>
        <div class="col-10 char-card__header">
        <h1><?php echo $character["CharacterName"] ?></h1>
        <h2><?php  echo $character['CharacterRace']?> | <?php echo $character['CharacterClass'] ?> </h2>
        </div>
        <br>
        <div class="col-10 border-top--disabled char-card__icons">
            <span class="ico-h1">
                <i class='bx bxs-castle'></i>
            </span>
            <span class="ico-h1">
                <i class='bx bxs-cog'></i>
            </span>
            <span class="ico-h1">
                <i class='bx bxs-flask'></i>
            </span>
        </div>
    </div>
    <?php } ?> 
    <?php } ?> 



    <!-- here to evenout the flex justify, do not remove -->
    <span class="col-38"></span>
</div>

<div class="modal" data-toggle="false" data-modal="modal-character-create">
        <div class="modal__body block--rounded">
            <div class="block--info block--rounded">
                <h2 class="linebox">Karakter aanmaken</h2>
                <a href="JavaScript:Void(0)" class="rev float-right"><i class='bx bx-x ico-h2 modal-btn' data-modal="modal-character-create"></i></a>

            </div>

<form class="block form" action="./CreateCharacter" method="post">
    Naam: <br> <input type="text" placeholder="Karakter naam"name="name">
    <br>


    Karakter Ras: <br> 
    <select name="race" id="race">
    <?php foreach ($dndRaces as $Race){ ?>
        <option value=<?php Echo $Race['RaceName']?>><?php echo $Race['RaceName'] ?></option>   

    <?php }?>
    </select>
    <br>
    Karakter Class: <br> <select name="class" id="class">
    <?php foreach ($dndClasses as $Class){ ?>
        <option value=<?php echo $Class['ClassName'] ?>><?php echo $Class['ClassName'] ?></option>

    <?php }?>
    </select><br><br>

    <input type="submit" value="Aanmaken" class="btn_info">
</form>
        </div>
    </div>