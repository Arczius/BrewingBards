<!-- flex holder -->
<div class="block--main-info block--flex">


    <!-- card item -->
    <div class="block--main-info  border--rounded border--dark col-38 char-card">
        <div class="col-12 border-bottom--dark">
        <i class='bx ico-h2 switch-btn' data-toggle="true" data-name="test"></i>
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
            <i class='bx bx-download' ></i>
            <span class="tooltiptext--bottom">Downloaden</span>
            </a>
        </div>
        <div class="col-10 char-card__header">
            <h1>Naam</h1>
            <h2>Class | Race</h2>
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
                <i class='bx bxs-flask' ></i>
                <i class='bx bxs-check-circle alert-icon--green'></i>
                <span class="tooltiptext--bottom">Derde voorbeeld</span>
            </a>
        </div>
    </div>


 <!-- card item DISABLED-->
 <div class="block--disabled border--rounded border--disabled col-38 char-card">
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
            <i class='bx bx-download' ></i>
            <span class="tooltiptext--bottom">Downloaden</span>
            </a>
        </div>
        <div class="col-10 char-card__header">
            <h1>Inactief</h1>
            <h2>Class | Race</h2>
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
                <i class='bx bxs-flask' ></i>
            </span>
        </div>
    </div>





    <!-- here to evenout the flex justify, do not remove -->
    <span class="col-38"></span>
</div>

<script>
    var toggles = document.getElementsByClassName('switch-btn');

    function switchToggle(elementName) {
        var switchElm = document.querySelector('[data-name='+ elementName +']');
        if ( switchElm.dataset.toggle == "true" ) {
            switchElm.dataset.toggle = "false";
        } else {
            switchElm.dataset.toggle = "true";
        }
    }

    for (let i = 0; i < toggles.length; i++) {
        let elmName = toggles[i].dataset.name;
        toggles[i].addEventListener('click', function(){switchToggle(elmName)});
    }
</script>