





<!--<div class="navbar navbar-inverse navbar-fixed-top">-->
<!--    <div class="navbar-inner">-->
<!--        <div class="container">-->
<!--            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a href="/" class="brand">Blog</a>-->
<!--            <div class="span8">-->
<!--                <h1>BLOG</h1>-->
<!--            </div>-->
<!--            <div class="span4">-->
<!--                --><?php //echo $this->Form->create('User',array('controller'=>'users','action'=>'login')); ?>
<!--                <table cellspacing="0" class="color-white">-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!---->
<!--                        --><?php
//                        if(empty($userId))
//                        {
//                            ?>
<!---->
<!--                            <td>-->
<!--                                --><?php //echo $this->Form->input('username', array('class' => "html7magic"));?>
<!--                            </td>-->
<!--                            <td>-->
<!--                                --><?php //echo $this->Form->input('password', array('class' => "html7magic")); ?>
<!--                            </td>-->
<!--                            <td>-->
<!--                                --><?php
//                                echo $this->Form->input('Sign in', array('type'=>'submit','class' => 'btn btn-pink-login','label'=>false));
//                                echo $this->Form->end(); ?>
<!--                            </td>-->
<!--                            --><?php //}
//
//                        else {
//                            ?>
<!--                            <td>-->
<!--                                --><?php //echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));?>
<!--                            </td>-->
<!--                            --><?php //} ?>
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!---->












<div class="span12">
    <div class="row">
        <span class="navbar navbar-inverse">
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
                            <?php echo $this->Form->input('username', array('class' => "html7magic"));?>
                        </td>
                        <td>
                            <?php echo $this->Form->input('password', array('class' => "html7magic")); ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->input('Sign in', array('type'=>'submit','class' => 'btn btn-pink-login','label'=>false));
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
        </span>
    </div>
</div>

<div class="span12">

    <?php
//    pr($posts);die;
    if(!empty($roleType))
    {
    echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'));
    }
    ?>
    <br/><br/><br/>
    <table>

        <?php foreach ($posts as $post): ?>
        <tr>
            <?php echo $this->Html->link($post['Post']['title'],
            array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?><br/>
        </tr>
        <tr class="error">
            <?php echo $post['Post']['body']?><br/>
        </tr>
        <tr>
            Created On:<?php echo $post['Post']['created']; ?><br/>
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

            <?php

            if(!empty($roleType))
            {
                echo "Comments<br/><br/>";
                foreach($post['Comment'] as $comment)
                {
                    echo "Commented by:".$comment['name']."<br/>";
                    echo "Comment:".$comment['comment']."<br/>";
                    echo "On:".$comment['created']."<br/>";
                }
            }
            ?> <br/><br/>
        </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </table>
</div>







