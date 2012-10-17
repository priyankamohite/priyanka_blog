<?php
class Comment extends AppModel {

    public $name = 'Comment';
    public $belongsTo = array(
        'Post' => array(
            'className'    => 'Post',
            'foreignKey'   => 'post_id'
        )
    );
}
?>