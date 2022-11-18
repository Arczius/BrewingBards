<div class="block">
<div class="table--special table--rounded">

<div class="table__item">
    <div class="table__item__col col-4">
       <b> Naam Template </b>
    </div>
    <span class="table__item__col"></span>
</div>

<!-- Template item -->
<?php foreach ($templates as $template){ ?>
<div class="table__item">
    <div class="table__item__col col-4">
        <i><?php echo $template['templateName']; ?></i>
    </div>
    <span class="table__item__col grow-item"></span>
    <a href="JavaScript:Void(0)" class='table__item__col col-1 txt_cntr link-item modal-btn' data-modal="mail-modal-<?php echo $template['MailingID']; ?>">
        Bewerken <i class='bx bxs-edit-alt'></i>
    </a>
</div>
<?php } ?>

</div>
    
    <!-- modal card -->
    <?php foreach ($templates as $template){ ?>
    <div class="modal" data-toggle="false" data-modal="mail-modal-<?php echo $template['MailingID']; ?>">
        <div class="modal__body block--rounded">
            <div class="block--main block--rounded">
                <h2 class="linebox"><?php echo $template['templateName']; ?></h2>
                <a href="JavaScript:Void(0)" class="rev float-right"><i class='bx bx-x ico-h2 modal-btn' data-modal="mail-modal-<?php echo $template['MailingID']; ?>"></i></a>
            </div>
            <div class="block">
                <h4>Vul mailing inhoud in:</h4>
                <br>
                <div class="editor" id="editor">
                <?php echo $template['content']; ?>
                </div>
                <br>
                <button class="btn_default" onclick="test()">Toon Content code</button>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
