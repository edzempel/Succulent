<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant[]|\Cake\Collection\CollectionInterface $plants
 */
?>


<!--The top buttons on the page-->
<?= $this->Html->link(__('Add Plant'), ['controller' => 'plants', 'action' => 'add'], ['class' => 'btn btn-success float-right mt-4 mr-5']) ?>



<!--The Sort dropdown button-->
<div class="dropdown ">
    <button class="btn btn-success dropdown-toggle float-right mt-4 mr-5" type="button" id="dropdownMenu2"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        <a class="dropdown-item"><?= $this->Paginator->sort('scientific_name') ?></a>
        <a class="dropdown-item"><?= $this->Paginator->sort('common_name') ?></th></a>
        <a class="dropdown-item"><?= $this->Paginator->sort('created') ?></a>
        <a class="dropdown-item"><?= $this->Paginator->sort('modified') ?></a>
        <a class="dropdown-item"> </a>

    </div>
</div>




    <div class="row  mx-auto">
        <?php foreach ($plants as $plant): ?>
            <div class="col-lg-3">

                    <div class="card m-5 zoom" style="width: 18rem;">
<!--                        <img src="img/Aloe.jpg" class="card-img-top" alt="Succulent">-->
                        <?= $this->Html->image('smaller baby toes.jpg',['class'=>'card-img-top  ', 'alt' => 'succulent logo', 'url'=> ['controller'=>'Plants', 'action' => 'view' , $plant->id]]);?>
                        <div class="card-body mx-auto ">
                            <?= $this->Html->link(__(($plant->common_name)), ['action' => 'view', $plant->id], array('class' => 'btn btn-danger')) ?>
                        </div>
                    </div>
            </div>


        <?php endforeach; ?>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
