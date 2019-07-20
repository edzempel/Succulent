<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>

<?= $this->Form->postLink(__(''), ['action' => 'delete', $plant->id], ['class' => 'btn btn-info float-right mt-4 mr-4 fas fa-trash-alt'] ,['confirm' => __('Are you sure you want to delete # {0}?', $plant->common_name)]) ?>

<?= $this->Html->link(__(''), ['action' => 'edit', $plant->id], ['class' => 'btn btn-info float-right mt-4 mr-4 fas fa-edit']) ?>


<div class="plants view large-9 medium-8 columns content">
    <h3><?= h($plant->common_name) ?></h3>
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
    <div class="related">
        <h4><?= __('Notes') ?></h4>
        <table cellpadding="0" cellspacing="0">

            <tr>
                <td><?= $this->Text->autoParagraph(h($plant->notes)); ?></td>
            </tr>
        </table>

    </div>



</div>
