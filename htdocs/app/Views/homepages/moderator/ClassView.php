<div class="block max-w-6xl mx-auto">

    <div class="block px-4 md:px-2 lg:px-0 pt-4 md:pt-8 lg:pt-10">
        <h2 class="pl-4 font-bold text-2xl">Overzicht Klas: <?php echo $ClassName?></h2>

        <a class="float-right pr-4" href="<?php echo base_url(); ?>/Mod/AddSingleStudent/<?php echo $classId ?>">Voeg Student toe</a>

        <table class="table-auto w-full">
            <thead class="border-b ">
                <tr class="w-full bg-gray-300">
                    <th class="pl-4 py-4 text-left text-xl">Student nummer:</th>
                    <th class="py-4 text-left text-xl">Naam:</th>
                    <th class="py-4 text-left text-xl">E-mail Adres:</th>
                    <th class="py-4 text-left text-xl">Laatst ingelogd:</th>
                    <th class="pr-4 py-4 text-left text-xl">Overige:</th>
                </tr>
            </thead>

            <tbody class="bg-gray-200">
                <?php
                    foreach($Students as $Student){
                        if(!$Student['Archive']){
                            ?>
                            <tr>
                                <td class="pl-4 py-4">
                                    <?php echo $Student['SchoolUserName']; ?>
                                </td>
                                <td class="py-4">
                                    <?php echo $Student['Name']; ?>
                                </td>
                                <td class="py-4">
                                    <a class="hover:underline" href="mailto:<?php echo $Student['Mail']; ?>">
                                        <i class="fa-solid fa-envelope"></i> <?php echo $Student['Mail']; ?>
                                    </a>
                                </td>
                                <td class="py-4">
                                    <?php
                                        if($Student["TimeLastLoggedIn"] == "0000-00-00 00:00:00"){
                                            echo "nooit ingelogged";
                                        }
                                        else{
                                            echo $Student["TimeLastLoggedIn"];
                                        }
                                    ?>
                                </td>
                                <td class="pr-4 py-4">
                                    <div class="flex flex-wrap">
                                        <a href="<?php echo base_url(); ?>/Mod/Archive/<?php echo $Student["ID"] ?>" class="flex-grow">
                                            <i class="fa-solid fa-box-archive"></i>
                                        </a>
                                        <a href="<?php echo base_url(); ?>/Mod/SwitchClass/<?php echo $Student["ID"] ?>" class="flex-grow">
                                            <i class="fa-solid fa-shuffle"></i>
                                        </a>
                                        <a href="<?php echo base_url(); ?>/Mod/StudentEdit/<?php echo $Student["ID"] ?>" class="flex-grow">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="<?php echo base_url(); ?>/Mod/StudentDelete/<?php echo $Student["ID"] ?>" class="flex-grow">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>

            </tbody>
        </table>
    </div>
</div>
