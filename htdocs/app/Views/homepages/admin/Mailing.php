<div class="block">

    <a href="JavaScript:Void(0)" class="modal-btn tooltip" data-modal="keywords">
        Keywords <i class='bx bx-info-circle'></i>
        <span class="tooltiptext">Bekijk Keywords</span>
    </a>
    <br><br>

    <div class="table--special table--rounded">

        <div class="table__item">
            <div class="table__item__col col-4">
                <b> Naam Template </b>
            </div>
            <span class="table__item__col g"></span>
        </div>

        <!-- Template item -->
        <?php foreach ($templates as $template) { ?>
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
    <?php foreach ($templates as $template) { ?>
        <div class="modal" data-toggle="false" data-modal="mail-modal-<?php echo $template['MailingID']; ?>">
            <div class="modal__body block--rounded">
                <div class="block--main block--rounded">
                    <h2 class="linebox"><?php echo $template['templateName']; ?></h2>
                    <a href="JavaScript:Void(0)" class="rev float-right"><i class='bx bx-x ico-h2 modal-btn' data-modal="mail-modal-<?php echo $template['MailingID']; ?>"></i></a>
                </div>
                <div class="block">
                    <form action="<?php echo base_url(); ?>/Admin/editTemplates" method="post">
                        <h4>Vul mailing inhoud in:</h4>
                        <br>
                        <div class="editor" id="mailingContent">
                            <?php echo $template['content']; ?>
                        </div>
                        <br>
                        <input type="hidden" name="mailingID" value="<?php echo $template['MailingID']; ?>">
                        <input type="submit" class="btn_second" value="Opslaan">
                    </form>
                    <br>
                    <p>Beschikbare keywords: <?php echo $template['keywords']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- modal card -->
    <div class="modal" data-toggle="false" data-modal="keywords">
        <div class="modal__body block--rounded">
            <div class="block border-bottom--disabled">
                <h2 class="linebox">Keywords</h2>
                <a href="JavaScript:Void(0)" class="rev float-right"><i class='bx bx-x ico-h2 modal-btn' data-modal="keywords"></i></a>
            </div>
            <div class="block">
                <p>
                    Type deze woorden in je mailing template, zodat deze vervangen zullen worden in de uiteindelijke mail.
                </p>
                <br>
                <ul>
                    <li>
                        <b>{USERNAME}</b><br>
                        Zet de naam van de ontvanger neer
                    </li>
                    <li>
                        <b>{MAIL}</b><br>
                        Zet de mail van de ontvanger neer
                    </li>
                    <li>
                        <b>{PASSWORD}</b><br>
                        Zet het wachtwoord van de ontvanger neer
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>