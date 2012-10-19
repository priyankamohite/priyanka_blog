
<script type="text/javascript">
    var SelfID = jQuery(this).attr("id");

    jQuery(function(){
        jQuery("#username").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter usename"
        });
        jQuery("#password").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter password"
        });
    });
</script>

<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="span8">
                <h1>BLOG</h1>
            </div>
            <div class="span4">
                <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'login')); ?>
                <table cellspacing="0" class="color-white">
                    <tbody>
                    <tr>

                        <?php
                        if(empty($userId))
                        {
                            ?>

                            <td>
                                <?php echo $this->Form->input('username',array('id'=>'username'));?>
                            </td>
                            <td>
                                <?php echo $this->Form->input('password', array('id'=>'password')); ?>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->input('Sign in', array('type'=>'submit','class' => 'btn','label'=>false));
                                echo $this->Form->end(); ?>
                            </td>
                            <?php }

                        else {
                            ?>
                            <td>
                                <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));?>
                            </td>
                            <?php } ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="span12">

    <?php
    if(!empty($roleType))
    {
    echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'));
    }
    ?>
    <br/><br/><br/>
    <table>

        <?php foreach ($posts as $post): ?>
        <tr>
            <p class="text-warning lead"> <?php echo $this->Html->link($post['Post']['title'],
            array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></p><br/>
        </tr>
        <tr>
            <p class="text-warning lead"> <?php echo $post['Post']['body']?><br/></p>
        </tr>
        <tr>
            Created On:<?php
            $date=$post['Post']['created'];
            echo date('Y-m-d', strToTime($date));
            ?><br/>
        </tr>

        <tr>


            <?php

            if(!empty($roleType)){?>

                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
                    <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?'));
                    ?>
                <?php } ?><br/><br/><br/>
        </tr>
        <tr>
            <p class="text-error lead"> <?php echo "Comments";?></p><?php
                foreach($post['Comment'] as $comment)
                {
                    if(!empty($comment['is_approve']) || !empty($roleType))
                    {?>

                        <?php echo $comment['comment']."<br/>";
                        echo "Commented by ".$comment['name'];
                        $date=$comment['created'];
                        echo " On: ".date('Y-m-d', strToTime($date))."<br/>";

                        if(!empty($roleType))
                        {
                            echo $this->Html->link('Approve',array('controller'=>'comments','action'=>'update',$comment['id']));
                            echo "<br/>";
                        }
                    }

                 }
            ?> <br/><br/>
        </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </table>
</div>







