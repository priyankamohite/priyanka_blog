


<div class="span12">
    <div class="row">
        <div class="span8">
            <h1>Blog posts</h1>
        </div>
        <div class="span4">
           <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'login')); ?>
            <table cellspacing="0" class="color-white">
                <tbody>
                <tr>
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
                </tr>
                </tbody>
            </table>
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
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <!--        <th>Actions</th>-->
        </tr>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td>
                <?php echo $this->Html->link($post['Post']['title'],
                array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
            </td>
            <td><?php echo $post['Post']['body']?></td>
            <td><?php echo $post['Post']['created']; ?></td>

            <?php

            if(!empty($roleType)){?>
                <td>
                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
                    <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?'));
                    ?>
                </td>
                <?php } ?>

        </tr>
        <?php endforeach; ?>
        <?php unset($post); ?>
    </table>
</div>







