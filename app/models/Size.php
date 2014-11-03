<?php

/**
 * Author   : Umayr Shahid
 * Date     : 11/3/2014
 * Time     : 5:46 PM
 */
use Illuminate\Database\Eloquent\Model;

class Size extends Model implements JsonSerializable
{
    public $height;
    public $width;

    protected $table = 'sizes';

    public function Size($size)
    {
        $this->height = explode('x', $size)[0];
        $this->width = explode('x', $size)[1];
    }

    public function jsonSerialize()
    {
        return array(
            'height' => $this->height,
            'width' => $this->width
        );
    }

    protected static function fromRow($row)
    {
        return new self(
            $row->{'height'} . 'x' . $row->{'width'}
        );
    }
    public static function getAll(){
        $result = DB::table('sizes')->get();
        $array = array();
        foreach($result as $row){
            $array[] = Size::fromRow($row);
        }
        return $array;
    }
} 