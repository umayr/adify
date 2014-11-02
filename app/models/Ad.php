<?php
/**
 * Author   : Umayr Shahid
 * Date     : 11/2/2014
 * Time     : 8:11 PM
 */

use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use Rhumsaa\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $id;
    public $name;
    public $height;
    public $width;
    public $added_on;
    public $unique_id;

    protected $table = 'ads';

    public function Ad($name, $size)
    {
        $this->name = $name;
        $this->height = explode("x", $size)[0];
        $this->width = explode("x", $size)[1];
        $date = new DateTime();
        $this->added_on = $date->format('c');
        $this->unique_id = $this->getUniqueId();
    }

    protected function getUniqueId()
    {
        try {
            return Uuid::uuid1();
        } catch (UnsatisfiedDependencyException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    public function insert()
    {
        return DB::table($this->table)->insertGetId(
            array(
                'name' => $this->name,
                'height' => $this->height,
                'width' => $this->width,
                'added_on' => $this->added_on,
                'unique_id' => $this->unique_id
            )
        );
    }
} 