<form action="<?php echo base_url(); ?>/StudentCreateController/CreateUsers" method="post">
    <div>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
    </div>
    <div>
        <input type="hidden" name="class" value="<?php echo $HoldID?>" class="form-control" >
    </div>
    
    <div>
            <button type="submit" class="btn btn-success">Create</button>
    </div>     
</form>