<div class="block">
    <h3>Moderater account aanmaken</h3>
    <br>
<form action="./createModAccount" method="post" class="form--main">
    <input type="text"name="UserName"  placeholder='Username'>
    <br><br>
    <input type="email" name="Mail" placeholder="voorbeeld@domein.nl" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
    <br><br>
    <input type="password" name="Password" placeholder='Password' pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}">
    <br><br>
    <input type="submit" value="Submit" class="btn_success">
</form>
</div>