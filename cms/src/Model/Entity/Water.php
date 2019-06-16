<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Water Entity
 *
 * @property int $id
 * @property int $plant_id
 * @property \Cake\I18n\FrozenTime|null $water_date
 *
 * @property \App\Model\Entity\Plant $plant
 */
class Water extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'plant_id' => true,
        'water_date' => true,
        'plant' => true
    ];
}
