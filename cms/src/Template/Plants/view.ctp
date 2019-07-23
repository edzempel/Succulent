<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>


<div class="container-profpic">

    <div class="row">
        <div class="col-12">
            <?= $this->Form->postLink(__(''), ['action' => 'delete', $plant->id], ['class' => 'btn btn-danger float-right mt-5 mr-4 fas fa-trash-alt fa-2x', 'confirm' => __('Are you sure you want to delete {0}?', $plant->common_name)]) ?>

            <?= $this->Html->link(__(''), ['action' => 'edit', $plant->id], ['class' => 'btn btn-secondary float-right mt-5 mr-4 fas fa-pen fa-2x']) ?>

            <div class="font-weight-bold mt-4 text-dark text-com-name text-com-color"><?= h($plant->common_name) ?></div>
            <div class="font-weight-normal mb-4 text-secondary text-sci-name"><?= h($plant->scientific_name) ?></div>
        </div>
    </div>


    <div class="">


        <div class="row">

                <div class="col text-sci-name text-secondary ">Oldest Photo</div>

                <div class="col text-sci-name text-secondary text-center cus_margin">Newest Photo</div>
        </div>


        <div class="row">
            <div class="col-12">
                <?= $this->Html->image('young wax.JPG', ['class' => ' mb-4 plantPicwidth rounded border ', 'alt' => 'The First Photo Added', 'url' => ['controller' => 'Plants', 'action' => 'view', $plant->id]]); ?>

                <?= $this->Html->image('wax agave.jpg', ['class' => 'float-right plantPicwidth rounded border ', 'alt' => 'The Last Photo Added', 'url' => ['controller' => 'Plants', 'action' => 'view', $plant->id]]); ?>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">

            <?= $this->Html->link(__('Last Watered: ' . $this->request->session()->read('last_watered')), ['controller' => 'Waters', 'action' => 'index', $plant->id], ['class' => 'text-secondary text-sci-name text-decoration-none mr-2']) ?>

            <?= $this->Html->link(__(''), ['controller' => 'Waters', 'action' => 'add'], ['class' => 'btn btn-info fas fa-tint ml-4 fa-2x']) ?>

        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">

            <?= $this->Html->link(__('Last Potted: ' . $this->request->session()->read('last_potted')), ['controller' => 'Pots', 'action' => 'index', $plant->id], ['class' => 'text-secondary text-sci-name text-decoration-none']) ?>


            <?= $this->Html->link(__(''), ['controller' => 'Pots', 'action' => 'add'], ['class' => 'btn btn-warning fas fa-spa ml-5 fa-2x']) ?>

        </div>
    </div>

</div>
<div class="container-prof">

    <div class="mt-4">
        <div class="text-com-name text-danger"> Notes</div>


        <div class="bg-light p-2"><?= $this->Text->autoParagraph(h($plant->notes)); ?></div>


    </div>


</div>

