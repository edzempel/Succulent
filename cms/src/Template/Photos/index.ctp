<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo[]|\Cake\Collection\CollectionInterface $photos
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');
?>


<div class="row mt-4">


    <div class="col">
        <div class="mb-4 btn btn-success position-relative">

            <?= $this->Html->link(__(' '), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => ' text-decoration-none fas fa-arrow-left fa-2x text-light stretched-link']); ?>

        </div>
    </div>




        <h1 class="text-center text-com-color font-weight-bold col"><?= __($common_name.'\'s Photos') ?></h1>

    <div class="col">
        <div class="float-right ml-3">
            <!--The top buttons on the page-->
            <?= $this->Html->link(__(''), ['controller' => 'photos', 'action' => 'add', $plant_id], ['class' => 'btn btn-success fas fa-plus fa-2x']) ?>
        </div>

        <div class="float-right ">
            <!--The Sort dropdown button-->
            <div class="dropdown ">
                <button class="btn btn-success dropdown-toggle fas fa-sort-alpha-down fa-2x" type="button"
                        id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                    <div class="dropdown-item "><?= $this->Paginator->sort('photo') ?></div>
                    <div class="dropdown-item"><?= $this->Paginator->sort('created') ?></div>
                    <div class="dropdown-item"><?= $this->Paginator->sort('type') ?></div>
                    <div class="dropdown-item"><?= $this->Paginator->sort('size') ?></div>
                </div>
            </div>
        </div>
    </div>

</div>



<div class="">
    <div class="row  mx-auto">

        <?php foreach ($photos as $photo): ?>
            <div class="col-lg-3 col-md-4 col-6 p-4 ">

                <div class="card zoom-card">
                    <?= $this->Html->image(substr($photo->dir, 12).$photo->photo, ['class' => 'card-img-top  ', 'alt' => 'succulent logo', ]); ?>

                    <div class="card-body row">

                        <div class="col-8 font-weight-bold">
                         <?= __($photo->photo) ?>
                        </div>
                        <div class="col-8 text-secondary">
                            <?= __($photo->created->format('m-d-y')) ?>
                        </div>

                        <div class="col-4">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $photo->id], ['class' => 'btn btn-danger float-right  fas fa-trash-alt fa-2x', 'confirm' => __('Are you sure you want to delete {0}?', $photo->photo)]) ?>
                        </div>

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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} photos(s) out of {{count}} total')]) ?></p>
    </div>

