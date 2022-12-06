<div class="w-full h-full flex justify-center items-center pt-4 md:pt-8 lg:pt-10">
    <div>
        <div class="bg-gray-300 py-4 px-4">
            <h3 class="text-2xl">Moderator account aanmaken</h3>
        </div>

        <form class="bg-gray-200 px-4" action="<?php echo base_url(); ?>/Admin/createModAccount" method="post">
            <div class="py-4">
                <label class="block font-bold text-xl" for="UserName">Naam:</label>
                <input class="outline-none focus:border-b-gray-400 placeholder:text-xl text-xl bg-gray-200 border-b-gray-300 border-b-2 w-full" type="text" name="UserName"  placeholder='John Doe'>
            </div>

            <div class="py-4">
                <label class="block font-bold text-xl" for="Mail">E-mail adres:</label>
                <input class="outline-none focus:border-b-gray-400 placeholder:text-xl text-xl bg-gray-200 border-b-gray-300 border-b-2 w-full" type="email" name="Mail" placeholder="johndoe@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            </div>

            <div class="py-4">
                <label class="block font-bold text-xl" for="Afkorting">Afkorting:</label>
                <input class="outline-none focus:border-b-gray-400 placeholder:text-xl text-xl bg-gray-200 border-b-gray-300 border-b-2 w-full" type="text" name="Afkorting" placeholder="JD">
            </div>

            <div class="py-4">
                <input class="outline-none border-b-gray-300 border-b-2 hover:border-b-gray-400 cursor-pointer w-full text-xl" type="submit" value="Submit" class="btn_success">
            </div>

        </form>
    </div>
</div>
