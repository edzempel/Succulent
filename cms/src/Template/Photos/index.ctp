<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo[]|\Cake\Collection\CollectionInterface $photos
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photos index large-9 medium-8 columns content">
    <h3><?= __('Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">

        <tbody>
            <?php foreach ($photos as $photo): ?>
            <tr>
<!--                display the photos-->
                <td><?= $this->Html->image(substr($photo->dir, 12).$photo->photo, ['class' => 'card-img-top  ', 'alt' => 'succulent logo', ]); ?></td>
                <td><?= $this->Number->format($photo->id) ?></td>
                <td><?= $photo->has('plant') ? $this->Html->link($photo->plant->id, ['controller' => 'Plants', 'action' => 'view', $photo->plant->id]) : '' ?></td>
                <td><?= h($photo->photo) ?></td>
                <td><?= h($photo->dir) ?></td>
                <td><?= h($photo->size) ?></td>
                <td><?= h($photo->type) ?></td>
                <td><?= h($photo->created) ?></td>
                <td><?= h($photo->modified) ?></td>
                <td><?= h($photo->is_profile) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $photo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $photo->id], ['confirm' => __('Are you sure you want to delete {0}?', $photo->photo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>






    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} photos(s) out of {{count}} total')]) ?></p>
    </div>
</div>
