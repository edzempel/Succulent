<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Photo;
use App\Model\Table\PhotosTable;
use Psy\Util\Str;

/**
 * Class FirstAndLastPhotoComponent
 * @package App\Controller\Component
 *
 */
class FirstAndLastPhotoComponent extends Component
{
    protected $_defaultConfig = [];

    /**
     * @param int $plant_id
     * @return array with first and last keys
     */
    public function getFirstAndLastPhoto(int $plant_id)
    {
//        $this->loadModel('Photos'); // bad method
        $photos = TableRegistry::getTableLocator()->get('Photos');
        $query = $photos
            ->find()
            ->select()
            ->where(['plant_id' => $plant_id])
            ->orderDesc('created');
        $first = $query->last();
        $last = $query->first();

        return ['first' => $this->getPath($first) . $this->getName($first), 'last' => $this->getPath($last) . $this->getName($last)];

    }

    public function getPath(Photo $photo)
    {
        return $photo->dir;
    }

    public function getName(Photo $photo)
    {
        return $photo->photo;
    }
}
