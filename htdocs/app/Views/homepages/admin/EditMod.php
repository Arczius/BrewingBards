<div class="w-full h-full flex justify-center items-center pt-4 md:pt-8 lg:pt-10">
    <div>

        <div class="bg-gray-300 py-4 px-4 ">
            <h3 class="text-2xl">Moderator account aanpassen <i class="fa-solid fa-pen-to-square"></i></h3>
        </div>

        <form class="bg-gray-200 px-4" action="<?php echo base_url(); ?>/Admin/updateModAccount" method="post">
            <div class="py-4">
                <Label class="block font-bold text-xl">Naam:</Label>
                <input class="outline-none focus:border-b-gray-400 placeholder:text-xl text-xl bg-gray-200 border-b-gray-300 border-b-2 w-full" placeholder="John Doe" type="text" name="UserName"  value='<?php echo $moderator["Name"]?>'>
            </div>

            <div class="py-4">
                <Label class="block font-bold text-xl">E-mail adres:</Label>
                <input class="outline-none focus:border-b-gray-400 placeholder:text-xl text-xl bg-gray-200 border-b-gray-300 border-b-2 w-full" placeholder="johndoe@example.com" type="text" name="Mail"  value='<?php echo $moderator["Mail"]?>'>
            </div>

            <div class="py-4">
                <Label class="block font-bold text-xl">Afkorting:</Label>
                <input class="outline-none focus:border-b-gray-400 placeholder:text-xl text-xl bg-gray-200 border-b-gray-300 border-b-2 w-full" placeholder="JD" type="text" name="SchoolUserName"  value='<?php echo $moderator["SchoolUserName"]?>'>
            </div>

            <div class="py-4">
                <input class="outline-none border-b-gray-300 border-b-2 hover:border-b-gray-400 cursor-pointer w-full text-xl" type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
