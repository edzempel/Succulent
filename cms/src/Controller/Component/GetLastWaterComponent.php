<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * GetLastWater component
 */
class GetLastWaterComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getLastWater($id){
        $Waters = TableRegistry::getTableLocator()->get('Waters');
        $water = $Waters->find();
        $water->where(['plant_id' => $id]);
        $water->order(['water_date' => 'DESC']);
        $water = $water->first();
        $water = json_decode($water);
        if (is_object($water)) {
            $lastWatered = $water->water_date;
            $lastWatered = new Time($lastWatered);
            $lastWatered = $lastWatered->format('D, j M Y');

        } else {
            $lastWatered = 'not watered yet';
        }
        return $lastWatered;
    }
}
