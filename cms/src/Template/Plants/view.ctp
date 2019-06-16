<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Plant'), ['action' => 'edit', $plant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Plant'), ['action' => 'delete', $plant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pots'), ['controller' => 'Pots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pot'), ['controller' => 'Pots', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Waters'), ['controller' => 'Waters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Water'), ['controller' => 'Waters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="plants view large-9 medium-8 columns content">
    <h3><?= h($plant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $plant->has('user') ? $this->Html->link($plant->user->id, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scientific Name') ?></th>
            <td><?= h($plant->scientific_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Common Name') ?></th>
            <td><?= h($plant->common_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($plant->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($plant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($plant->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($plant->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($plant->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Photos') ?></h4>
        <?php if (!empty($plant->photos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Is Profile') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($plant->photos as $photos): ?>
            <tr>
                <td><?= h($photos->id) ?></td>
                <td><?= h($photos->plant_id) ?></td>
                <td><?= h($photos->url) ?></td>
                <td><?= h($photos->created) ?></td>
                <td><?= h($photos->modified) ?></td>
                <td><?= h($photos->is_profile) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Photos', 'action' => 'view', $photos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Photos', 'action' => 'edit', $photos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Photos', 'action' => 'delete', $photos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pots') ?></h4>
        <?php if (!empty($plant->pots)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Pot Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($plant->pots as $pots): ?>
            <tr>
                <td><?= h($pots->id) ?></td>
                <td><?= h($pots->plant_id) ?></td>
                <td><?= h($pots->pot_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pots', 'action' => 'view', $pots->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pots', 'action' => 'edit', $pots->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pots', 'action' => 'delete', $pots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pots->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Waters') ?></h4>
        <?php if (!empty($plant->waters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Water Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($plant->waters as $waters): ?>
            <tr>
                <td><?= h($waters->id) ?></td>
                <td><?= h($waters->plant_id) ?></td>
                <td><?= h($waters->water_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Waters', 'action' => 'view', $waters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Waters', 'action' => 'edit', $waters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Waters', 'action' => 'delete', $waters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $waters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
