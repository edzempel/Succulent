<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
 * LastPhotoForAll component
 */
class LastPhotoForAllComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function lastPhotoForAll($user_id)
    {
        $plants = TableRegistry::getTableLocator()->get('Plants');
        $plants = $plants
            ->find()
            ->select('id')
            ->where(['user_id' => $user_id])
            ->orderAsc('id');
        Log::write('debug', $plants);

        $last_photo = [];
        foreach ($plants as $key => $plant) {
            $photos = TableRegistry::getTableLocator()->get('Photos');
            $newest_photo = $photos
                ->find()
                ->select()
                ->where(['plant_id' => $plant['id']])
                ->orderDesc('created')->first()['photo'];

            $plant_id = $plant['id'];
            if($newest_photo == null){
                $last_photo[$plant_id] = 'default_photos/jade.jpg';
            } else{
                $last_photo[$plant_id] = 'photos/' . $plant->id . '/' .$newest_photo;
            }

        }
        Log::write('debug', $last_photo);
        return $last_photo;

    }
}
