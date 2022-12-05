<?php
helper('classLengthReader');
?>

<div class="block max-w-6xl mx-auto">

    <div class="block px-4 md:px-2 lg:px-0 pt-4 md:pt-8 lg:pt-10">

        <table class="table-auto w-full bg-gray-200">
            <thead class="border-b bg-gray-300">
                <tr class="w-full">
                    <th class="pl-4 py-4 text-left text-xl">Klasnaam:</th>
                    <th class="text-left text-xl py-4">Aantal studenten:</th>
                    <th class="pr-4 text-left text-xl py-4">Overige:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($classes as $class){
                        ?>
                        <tr>
                            <td class="py-4 pl-4">
                                <a href="<?php echo base_url(); ?>/Mod/classes/<?php echo $class['ID'] ?>">
                                    <i class="fa-solid fa-eye"></i> <?php echo $class['Name']; ?>
                                </a>
                            </td>
                            <td class="py-4">
                                <?php echo classLengthReader($class['ID']); ?>
                            </td>
                            <td>
                                <div class="flex flex-wrap">
                                    <a href="<?php echo base_url(); ?>/Mod/StudentCreate/<?php echo $class['ID'] ?>" class="flex-grow">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>/Mod/ClassesEdit/<?php echo $class['ID'] ?>" class="flex-grow">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>/Mod/DeleteClass/<?php echo $class['ID'] ?>" class="flex-grow">
                                        <i class="fa-solid fa-trash"></i>
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


    <a href="<?php echo base_url(); ?>/Mod/ClassCreate" class="btn_default">Klas toevoegen</a>
</div>
