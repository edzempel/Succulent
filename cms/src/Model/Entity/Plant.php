<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plant Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $scientific_name
 * @property string|null $common_name
 * @property string $slug
 * @property string|null $notes
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Photo[] $photos
 * @property \App\Model\Entity\Pot[] $pots
 * @property \App\Model\Entity\Water[] $waters
 */
class Plant extends Entity
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
        'user_id' => true,
        'scientific_name' => true,
        'common_name' => true,
        //'slug' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'photos' => true,
        'pots' => true,
        'waters' => true
    ];
}
