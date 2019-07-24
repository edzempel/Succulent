<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water[]|\Cake\Collection\CollectionInterface $waters
 */
$days_since_last_watered = $this->request->session()->read('days_since_watered');
$average_days_between_waters = $this->request->session()->read('average_days_between_waters');
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');
?>

<div class="container-prof">
    <div class="mt-3 mb-4 btn btn-success position-relative">

        <?= $this->Html->link(__(' '), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => ' text-decoration-none fas fa-arrow-left fa-2x text-light stretched-link']); ?>

    </div>

        <div class="font-weight-bold text-dark text-com-name text-com-color text-center mr-5"><?= $common_name; ?></div>

    <div class="row ">

        <div class="card col-lg-4 col-md-4 my-3 mx-auto">
            <div class="card-body text-center">
                <h2 class="card-title">
                    <?= $days_since_last_watered ?>
                </h2>
                <p class="card-text">Days since last watering</p>
            </div>
        </div>


        <div class="card float-right col-lg-4 col-md-4  my-3 mx-auto">
            <div class="card-body text-center">
                <h2 class="card-title">
                    <?= $average_days_between_waters ?>
                </h2>
                <p class="card-text">Average days between watering</p>
            </div>
        </div>


    </div>


    <div class="container-profpic">
        <div class="text-sci-name text-com-color mt-5 mb-2">Watering History</div>
        <table class="">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('water_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($waters as $water): ?>
                <tr>


                    <td><?= h($water->water_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $water->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $water->id], ['confirm' => __('Are you sure you want to delete # {0}?', $water->id)]) ?>
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
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} water(s) out of {{count}} total')]) ?></p>
        </div>
    </div>

</div>