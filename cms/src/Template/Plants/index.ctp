<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant[]|\Cake\Collection\CollectionInterface $plants
 */
?>

<div class="row my-3">
    <div class="col-12 ">


        <div class="float-right ml-3">
            <!--The top buttons on the page-->
            <?= $this->Html->link(__(''), ['controller' => 'plants', 'action' => 'add'], ['class' => 'btn btn-success fas fa-plus fa-2x']) ?>
        </div>

        <div class="float-right ">
            <!--The Sort dropdown button-->
            <div class="dropdown ">
                <button class="btn btn-success dropdown-toggle fas fa-sort-alpha-down fa-2x" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                    <div class="dropdown-item "><?= $this->Paginator->sort('scientific_name') ?></div>
                    <div class="dropdown-item"><?= $this->Paginator->sort('common_name') ?></div>
                    <div class="dropdown-item"><?= $this->Paginator->sort('created') ?></div>
                    <div class="dropdown-item"><?= $this->Paginator->sort('modified') ?></div>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="">
    <div class="row  mx-auto">

        <?php foreach ($plants as $plant): ?>
            <div class="col-lg-3 col-md-4 col-6 p-4 ">

                <div class="card zoom-card">
                    <!-- <img src="img/Aloe.jpg" class="card-img-top" alt="Succulent">-->
                    <?= $this->Html->image('smaller wax agave.jpg', ['class' => 'card-img-top  ', 'alt' => 'succulent logo', 'url' => ['controller' => 'Plants', 'action' => 'view', $plant->id]]); ?>

                    <div class="card-body ml-2">
                       <h3> <?= $this->Html->link(__(($plant->common_name)), ['action' => 'view', $plant->id], array('class' => 'stretched-link text-success text-decoration-none')) ?></h3>

                        <h5> <?= $this->Html->link(__(($plant->scientific_name)), ['action' => 'view', $plant->id], array('class' => 'text-secondary text-left')) ?></h5>

                    </div>
                </div>
            </div>


        <?php endforeach; ?>
    </div>
</div>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} plant(s) out of {{count}} total')]) ?></p>
</div>
