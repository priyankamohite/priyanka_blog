<?php //pr($comments);die; ?>
<table>
    <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Comment</th>
        <th>Created</th>
    </tr>
    <?php foreach ($comments as $comment): ?>
    <tr>
        <td><?php echo $comment['Comment']['name']; ?></td>
        <td><?php echo $comment['Comment']['username']; ?></td>
        <td><?php echo $comment['Comment']['comment']; ?></td>
        <td><?php echo $comment['Comment']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($comment); ?>
</table>
