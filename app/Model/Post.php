<?php
class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public $name = 'Post';

    public $hasMany = array(
        'Comment' => array(
            'className'     => 'Comment',
            'foreignKey'    => 'post_id',
            'dependent'     => true
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'user_id'
        )
    );
}
?>