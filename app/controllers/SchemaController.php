<?php
/**
 * Created by Umayr Shahid.
 * Date: 11/2/2014
 * Time: 7:25 PM
 */

class SchemaController extends BaseController
{

    public function generateSchema()
    {
        $this->_createTables();
    }

    private function _createTables()
    {
        try{
            if (!Schema::hasTable('ads')) {
                Schema::create('ads', function ($table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->integer('height');
                    $table->integer('width');
                    $table->timestamp('added_on');
                    $table->string('unique_id');
                });
            }
        }
        catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
} 