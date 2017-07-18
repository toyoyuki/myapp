<?php
$this->assign('title', 'ブログ内容');
?>

<h1>
  <?= $this->Html->link('戻る', ['action'=>'index'], ['class'=>'headlink']); ?>
  <?= h($post->title); ?>
</h1>

<p><?= nl2br(h($post->body)); ?></p>

<!-- 追加 -->
<?php if (count($post->comments)) : ?>
<h2>コメント (<?= count($post->comments); ?>)</h2>
<ul>
<?php foreach ($post->comments as $comment) : ?>
  <li>
    <?= h($comment->body); ?>
    <?=
      $this->Form->postLink(
        '[x]',
        ['controller'=>'Comments', 'action'=>'delete', $comment->id],
        ['confirm'=>'削除してもよろしいですか?', 'class'=>'delete']
      );
    ?>
  </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<h2>コメントする</h2>
<?= $this->Form->create(null, [
  'url' => ['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->input('body',['label' => 'コメント', 'required' => true]); ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<?= $this->Form->button('コメント'); ?>
<?= $this->Form->end(); ?>