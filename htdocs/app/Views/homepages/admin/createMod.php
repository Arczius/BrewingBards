<div class="block">
    <h3>Moderater account aanmaken</h3>
<form action="./createModAccount" method="post" class="form--accent form--rounded">
    <input type="text"name="UserName"  placeholder='Username'>
    <input type="email" name="Mail" placeholder="voorbeeld@domein.nl" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
    <input type="password" name="Password" placeholder='Password' pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}">
    <input type="submit" value="Submit">
</form>
</div>