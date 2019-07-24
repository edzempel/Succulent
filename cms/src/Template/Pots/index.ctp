<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot[]|\Cake\Collection\CollectionInterface $pots
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');
$days_since_potted = $this->request->session()->read('days_since_potted');
?>


<div class="container-profpic">


    <div class="mt-3 mb-4 btn btn-success position-relative">

        <?= $this->Html->link(__(' '), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => ' text-decoration-none fas fa-arrow-left fa-2x text-light stretched-link']); ?>

    </div>

    <div class="font-weight-bold text-dark text-com-name text-com-color text-center mr-5"><?= $common_name; ?></div>
    <div class="row ">
        <div class="card col-lg-4 col-md-4 mx-5 my-3 mx-auto">
            <div class="card-body text-center">
                <h2 class="card-title">
                    <?= $days_since_potted?>
                </h2>
                <p class="card-text">Days since last potting</p>
            </div>
        </div>


    </div>


    <div class="text-sci-name text-com-color mt-5 mb-2">Potting History</div>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('pot_date') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($pots as $pot): ?>
            <tr>
                <td><?= h($pot->pot_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pot->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pot->id], ['confirm' => __('Are you sure you want to delete {0} from potting history?', $pot->pot_date)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} pot(s) out of {{count}} total')]) ?></p>
    </div>
</div>
