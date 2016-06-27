<?php

namespace Craft;

/**
 * @property EntryModel entry
 * @property string sessionId
 */
class VisitsCountField_VisitsCountHistoryModel extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), [
            'entry' => [AttributeType::Mixed],
            'sessionId' => [AttributeType::String],
        ]);
    }
}