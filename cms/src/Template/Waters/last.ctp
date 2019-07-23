<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */

$last_watered_date = $this->request->session()->read('last_water_date');
if ($last_watered_date == null) {
    $last_watered_date = 'the value is not passed';
}
?>
<h1>Last watered</h1>
<p>
    <?= $last_watered_date ?>
</p>
<p>Water:
    <?= $this->request->session()->read('water'); ?>
</p>
<p>Since last:
    <?= $this->request->session()->read('difference'); ?>
</p>
