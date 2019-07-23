<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>

<div class="container-prof">
    <div class="">

        <?= $this->Form->postLink(__(''), ['action' => 'delete', $plant->id], ['class' => 'btn btn-info float-right my-4 mr-4 fas fa-trash-alt fa-2x', 'confirm' => __('Are you sure you want to delete {0}?', $plant->common_name)]) ?>

        <?= $this->Html->link(__(''), ['action' => 'edit', $plant->id], ['class' => 'btn btn-info float-right my-4 mr-4 fas fa-edit fa-2x']) ?>

        <div class="font-weight-bold mt-4 text-info text-com-name"><?= h($plant->common_name) ?></div>
        <div class="font-weight-normal mb-4 text-secondary text-sci-name"><?= h($plant->scientific_name) ?></div>

    </div>


    <div>
        <?= $this->Html->image('smaller baby toes1.jpg', ['class' => 'ml-4 mb-4', 'alt' => 'The First Photo Added', 'url' => ['controller' => 'Plants', 'action' => 'view', $plant->id]]); ?>

        <?= $this->Html->image('smaller baby toes1.jpg', ['class' => 'float-right mr-4 ', 'alt' => 'The Last Photo Added', 'url' => ['controller' => 'Plants', 'action' => 'view', $plant->id]]); ?>

    </div>

    <div class="row my-3">
        <div class="col-12">
            <?= $this->Html->link(__('Last Watered: ' . $this->request->session()->read('last_watered')), ['controller' => 'Waters', 'action' => 'index'], ['class' => 'text-secondary text-sci-name ml-4']) ?>

            <?= $this->Html->link(__(''), ['controller' => 'Waters', 'action' => 'add'], ['class' => 'btn btn-info fas fa-tint ml-4 fa-2x']) ?>

        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <?= $this->Html->link(__('Last Potted: ' . $this->request->session()->read('last_watered')), ['controller' => 'Pots', 'action' => 'index'], ['class' => 'text-secondary text-sci-name ml-4']) ?>

            <?= $this->Html->link(__(''), ['controller' => 'Pots', 'action' => 'add'], ['class' => 'btn btn-info fas fa-spa ml-4 fa-2x']) ?>

        </div>
    </div>


    <div class="mt-4">
        <div class="text-com-name text-danger"> Notes</div>

        <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="text-secondary text-sci-name"><?= $this->Text->autoParagraph(h($plant->notes)); ?></td>
            </tr>
        </table>

    </div>


</div>

