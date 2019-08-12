<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property int $id
 * @property int $plant_id
 * @property string|null $photo
 * @property string|null $dir
 * @property string|null $size
 * @property string|null $type
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool|null $is_profile
 *
 * @property \App\Model\Entity\Plant $plant
 */
class Photo extends Entity
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
        'photo' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'is_profile' => true,
        'plant' => true
    ];
}
