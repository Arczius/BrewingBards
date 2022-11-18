<div class="block">
<div class="table--special table--rounded">

<div class="table__item">
    <div class="table__item__col col-4">
       <b> Naam Template </b>
    </div>
    <span class="table__item__col"></span>
</div>

<!-- Template item -->
<div class="table__item">
    <div class="table__item__col col-4">
        <i>Student aanmaken</i>
    </div>
    <span class="table__item__col grow-item"></span>
    <a href="JavaScript:Void(0)" class='table__item__col col-1 txt_cntr link-item modal-btn' data-modal="modal-1">
        Bewerken <i class='bx bxs-edit-alt'></i>
    </a>
</div>
</div>
    
    <!-- modal card -->
    <div class="modal" data-toggle="false" data-modal="modal-1">
        <div class="modal__body block--rounded">
            <div class="block--main block--rounded">
                <h2 class="linebox">Template: Student aanmaken</h2>
                <a href="JavaScript:Void(0)" class="rev float-right"><i class='bx bx-x ico-h2 modal-btn' data-modal="modal-1"></i></a>
            </div>
            <div class="block">
                <h4>Vul mailing inhoud in:</h4>
                <br>
                <div class="editor" id="editor">
                    <h2>basis content</h2>
                </div>
                <br>
                <button class="btn_default" onclick="test()">Toon Content code</button>
            </div>
        </div>
    </div>
</div>