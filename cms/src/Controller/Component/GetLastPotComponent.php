<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * GetLastPot component
 */
class GetLastPotComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Returns the most recent time potted for a plant
     * @param $id plant_id
     * @return Time|string time object or 'not potted yet' string
     */
    public function getLastPot($id)
    {
        $Pots = TableRegistry::getTableLocator()->get('Pots');
        $pot = $Pots->find();
        $pot->where(['plant_id' => $id]);
        $pot->order(['pot_date' => 'DESC']);
        $pot = $pot->first();
        $pot = json_decode($pot);
        if (is_object($pot)) {
            $lastPotted = $pot->pot_date;
            $lastPotted = new Time($lastPotted);
            $lastPotted = $lastPotted->format('D, j M Y');

        } else {
            $lastPotted = 'not potted yet';
        }
        return $lastPotted;
    }
}
