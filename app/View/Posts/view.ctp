<script type="text/javascript">
    var SelfID = jQuery(this).attr("id");

    jQuery(function(){
        jQuery("#name").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter usename"
        });

        jQuery("#name").validate({
            expression: "if (VAL.match(/^[a-zA-z ]*$/)) return true; else return false;;",
            message: "Please enter valid name"
        });

        jQuery("#username").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter username"
        });

        jQuery("#username").validate({
            expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;;",
            message: "Please enter valid  username"
        });

        jQuery("#comment").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter comment"
        });
    });
</script>
<script type="text/javascript" src="/ckeditor/ckeditor.js">
    CKEDITOR.replace( 'editor' );
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
        echo "Comment";?>
        <textarea id="editor" name="editor"></textarea>
        <script type="text/javascript" >
        CKEDITOR.replace( 'editor' );
        </script>
        <?php
        echo $this->Form->hidden('post_id',array('value'=>$post['Post']['id']));
        echo $this->Form->end('Submit');
        ?>
    </div>
