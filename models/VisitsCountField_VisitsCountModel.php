<?php

namespace Craft;

class VisitsCountField_VisitsCountModel extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), [
            'visitsCount' => [AttributeType::Number, 'default' => 0],
        ]);
    }
}