<?php

namespace Craft;

class VisitsCountFieldVariable
{
    /**
     * @param EntryModel $entry
     */
    public function increment(EntryModel $entry)
    {
        craft()->visitsCountField_visitsCount->increment($entry);
    }
}