<?php //pr($post);die; ?>
<?php echo $post['Post']['title']; ?>

Created: <?php echo $post['Post']['created']; ?>

<?php echo $post['Post']['body']; ?>


<h1>Add Comment</h1>
<?php
echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));
echo $this->Form->input('name');
echo $this->Form->input('username');
echo $this->Form->input('comment', array('rows' => '3'));
echo $this->Form->hidden('post_id',array('value'=>$post['Post']['id']));
echo $this->Form->end('Submit');
?>