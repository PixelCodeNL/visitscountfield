<?php

namespace Craft;

/**
 * @property string sessionId
 * @property int entry
 */
class VisitsCountField_VisitsCountHistoryRecord extends BaseRecord
{
    /**
     * @inheritdoc
     */
    public function getTableName()
    {
        return 'visitscount_history';
    }

    /**
     * @inheritdoc
     */
    protected function defineAttributes()
    {
        return array(
            'entry' => AttributeType::Number,
            'sessionId' => AttributeType::String,
        );
    }

    /**
     * @inheritdoc
     */
    public function defineRelations()
    {
        return [
            'entry' => [static::HAS_MANY, EntryRecord::class, 'id']
        ];
    }
}