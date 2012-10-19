<script type="text/javascript">
    var SelfID = jQuery(this).attr("id");

    jQuery(function(){
        jQuery("#name").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter usename"
        });
        jQuery("#username").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter password"
        });

        jQuery("#comment").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter password"
        });
    });
</script>
    <div class="span12">
        <strong><p class="text-info lead"> <?php echo $post['Post']['title']; ?><br/></p></strong>
        <p class="text-warning lead"><?php echo $post['Post']['body']; ?><br/></p>
        Created On: <?php echo $post['Post']['created']; ?><br/>
    </div>


    <div class="span12">
        <h3>Add Comment</h3>
        <?php
        echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));
        echo $this->Form->input('name',array('id'=>'name'));
        echo $this->Form->input('username',array('id'=>'username'));
        echo $this->Form->input('comment', array('rows' => '3','id'=>'comment'));
        echo $this->Form->hidden('post_id',array('value'=>$post['Post']['id']));
        echo $this->Form->end('Submit');
        ?>
    </div>
