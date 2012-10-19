
    <div class="span12">
        <strong><p class="text-info lead"> <?php echo $post['Post']['title']; ?><br/></p></strong>
        <p class="text-warning lead"><?php echo $post['Post']['body']; ?><br/></p>
        Created On: <?php echo $post['Post']['created']; ?><br/>
    </div>


    <div class="span12">
        <h3>Add Comment</h3>
        <?php
        echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));
        echo $this->Form->input('name');
        echo $this->Form->input('username');
        echo $this->Form->input('comment', array('rows' => '3'));
        echo $this->Form->hidden('post_id',array('value'=>$post['Post']['id']));
        echo $this->Form->end('Submit');
        ?>
    </div>
