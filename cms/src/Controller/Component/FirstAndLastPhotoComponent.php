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

        $output = ['first' => null, 'last' => null];

        if ($first != null) {
            $first_photo = substr($this->getPath($first), 12) . $this->getName($first);
        } else {
            $first_photo = $this->babyPhoto();
        }
        if ($last != null && $query->count() >= 2) {
            $last_photo = substr($this->getPath($last), 12) . $this->getName($last);
        } else {
            $last_photo = $this->adultPhoto();
        }
        $output['first'] = $first_photo;
        $output['last'] = $last_photo;

        return $output;

    }

    public function getPath(Photo $photo)
    {
        return $photo->dir;
    }

    public function getName(Photo $photo)
    {
        return $photo->photo;
    }

    public function babyPhoto()
    {
        return 'default_photos/young_succ.jpg';
    }

    public function adultPhoto()
    {
        return 'default_photos/jade.jpg';
    }
}
