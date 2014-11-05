<?php
/**
 * Author   : Umayr Shahid
 * Date     : 11/2/2014
 * Time     : 8:11 PM
 */

use Illuminate\Database\Eloquent\Model;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use Rhumsaa\Uuid\Uuid;

class Ad extends Model implements JsonSerializable
{
    public $id;
    public $name;
    public $size;
    public $added_on;
    public $unique_id;
    public $code;

    protected $table = 'ads';

    public function Ad($name, $size = null, $code = null, $id = null, $added_on = null, $unique_id = null)
    {
        $this->name = $name;
        $this->size = new Size($size);
        $this->code = $code;
        if (is_null($added_on) && is_null($unique_id) && is_null($id)) {
            $date = new DateTime();
            $this->added_on = $date->format('c');
            $this->unique_id = $this->getUniqueId();
        } else {
            $this->id = $id;
            $this->added_on = $added_on;
            $this->unique_id = $unique_id;
        }
    }

    protected function getUniqueId()
    {
        try {
            return Uuid::uuid1();
        } catch (UnsatisfiedDependencyException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    public static function getAll()
    {

        $result = DB::table('ads')
            ->join('ads_src', 'ads.unique_id', '=', 'ads_src.unique_id')
            ->select(
                'ads.id as id',
                'ads.name as name',
                'ads.height as height',
                'ads.width as width',
                'ads.added_on as added_on',
                'ads.unique_id as unique_id',
                'ads_src.code as code')
            ->get();
        $array = array();
        foreach ($result as $row) {
            $array[] = Ad::fromRow($row);
        }
        return $array;
    }

    public static function fromRow($row)
    {
        $instance = new self(
            $row->{'name'},
            $row->{'height'} . 'x' . $row->{'width'},
            $row->{'code'}, // TODO: Add code property here.
            $row->{'id'},
            $row->{'added_on'},
            $row->{'unique_id'}
        );

        return $instance;
    }

    public static function getAllSizes()
    {
        return Size::getAll();
    }

    public static function getFromUniqueId($unique_id)
    {
        $row = DB::table('ads')
            ->join('ads_src', 'ads.unique_id', '=', 'ads_src.unique_id')
            ->select(
                'ads.id as id',
                'ads.name as name',
                'ads.height as height',
                'ads.width as width',
                'ads.added_on as added_on',
                'ads.unique_id as unique_id',
                'ads_src.code as code')
            ->where('ads.unique_id', $unique_id)
            ->first();
        if (!is_null($row)) {
            return Ad::fromRow($row);
        }
        return $row;
    }

    public function insert()
    {
        $id = DB::table($this->table)->insertGetId(
            array(
                'name' => $this->name,
                'height' => $this->size->height,
                'width' => $this->size->width,
                'added_on' => $this->added_on,
                'unique_id' => $this->unique_id
            )
        );
        DB::table('ads_src')->insert(
            array(
                'unique_id' => $this->unique_id,
                'code' => $this->code
            )
        );
        return $id;
    }

    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'size' => $this->size,
            'added_on' => $this->added_on,
            'unique_id' => $this->unique_id,
            'code' => $this->code
        );
    }
}