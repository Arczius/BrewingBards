<div class="container">
    <?php foreach($moderators as $moderator){
        ?>
            <div class="item">
                <h4><?php echo $moderator['Name']; ?></h4>
                <a href="mailto:<?php echo $moderator['Mail']; ?>"><?php echo $moderator['Mail'];?></a>
            </div> 
        <?php
    }?>
    <div class="new">
        <a href="#">
            nieuwe moderator aanmaken
        </a>
    </div>
</div>