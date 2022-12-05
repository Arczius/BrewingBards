<div class="block max-w-6xl mx-auto">

    <div>
        <a class="" href="<?php echo base_url()?>/Admin/mailing">Mailing templates</a>
    </div>

    <div class="block px-4 md:px-2 lg:px-0 pt-4 md:pt-8 lg:pt-10">

        <table class="table-auto w-full bg-gray-200">
            <thead class="border-b bg-gray-300">
                <tr class="w-full">
                    <th class="pl-4 text-left py-4 text-xl">Afkorting:</th>
                    <th class="text-left py-4 text-xl">Naam moderator:</th>
                    <th class="text-left py-4 text-xl">E-mail adres:</th>
                    <th class="text-left py-4 text-xl pr-4">Overige:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($moderators as $moderator){
                        ?>
                        <tr>
                            <td class="py-4 pl-4"><?php echo $moderator['SchoolUserName'];?></td>
                            <td class="py-4"><?php echo $moderator['Name']; ?></td>
                            <td class="py-4"><a href="mailto:<?php echo $moderator['Mail']; ?>" class="hover:underline"><i class='fa-solid fa-envelope' ></i> <?php echo $moderator['Mail']; ?></a></td>
                            <td class="py-4 pr-4">
                                <div class="flex flex-wrap">
                                    <a class="flex-grow" href="<?php echo base_url() . '/Admin/editModerator/' . $moderator['ID'];?>">
                                        <i class='fa-solid fa-pen-to-square'></i>
                                    </a>
                                    <a class="flex-grow" href="<?php echo base_url() . '/Admin/deleteModerator/' . $moderator['ID'];?>">
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <?php
                    }
                ?>
            </tbody>

        </table>

    </div>

    <a class="btn_second" href="./createModPage">
        nieuwe moderator
    </a>



</div>



