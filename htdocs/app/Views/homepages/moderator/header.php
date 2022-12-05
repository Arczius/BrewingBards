<header class="relative w-full bg-gray-900 p-4">
    <h3 class="text-yellow-300 text-3xl font-bold ">Welkom <?php echo $user['Name'] ?></h3>
    <a class="text-yellow-300 text-xl absolute right-4 top-4" href="<?php echo base_url(); ?>/logout">Uitloggen</a>
    <p class="text-yellow-300 text-xl pb-8">Ingelogd als Moderator</p>

    <a class="text-yellow-300 text-xl flex items-center" href="javascript:void(0)" onclick="history.back()"><i class='bx bx-left-arrow'></i> Ga terug</a>
</header>
