<?php

namespace Craft;

class VisitsCountField_VisitsCountService extends BaseApplicationComponent
{
    /**
     * Increment the visits count
     *
     * @param EntryModel $entry
     */
    public function increment(EntryModel $entry)
    {
        // Refresh the entry
        /** @var EntryModel $entry */
        $entry = craft()->entries->getEntryById($entry->id);

        $sessionId = session_id();
        if (!$this->isSessionRegisteredForEntry($sessionId, $entry)) {
            /** @var FieldLayoutFieldModel[] $fields */
            $fields = $entry->getFieldLayout()->getFields();

            foreach ($fields as $fieldLayoutModel) {
                $value = null;

                $field = $fieldLayoutModel->getField();
                $handle = $field->getAttribute('handle');

                // If the field is for storing visits, let's store it there.
                if ($field->getFieldType() instanceof VisitsCountField_VisitsCountFieldType) {
                    $value = $entry->getContent()->getAttribute($handle);
                    if ($value === null) {
                        $value = 0;
                    }
                    $value++;
                } elseif (
                    $field->getFieldType() instanceof CategoriesFieldType
                    || $field->getFieldType() instanceof AssetsFieldType
                ) {
                    // Hack for validation errors on relations with categories and assets
                    // See http://craftcms.stackexchange.com/a/11146
                    $value = $entry->{$handle}->ids();
                }

                if ($handle && $value) {
                    $entry->setContentFromPost([
                        $handle => $value
                    ]);
                }
            }

            if (craft()->entries->saveEntry($entry)) {
                $this->registerSessionForEntry($sessionId, $entry);
            } else {
                VisitsCountFieldPlugin::log(
                    sprintf('Cannot save entry for visits count: %s', print_r($entry->getAllErrors(), true))
                );
            }
        }
    }

    /**
     * @param string $sessionId
     * @param EntryModel $entry
     * @return bool
     */
    private function isSessionRegisteredForEntry($sessionId, EntryModel $entry)
    {
        $record = new VisitsCountField_VisitsCountHistoryRecord();

        return $record->find(
            sprintf(
                'sessionId = "%s" AND entry = %s',
                addslashes($sessionId),
                addslashes($entry->id)
            )
        ) !== null;
    }

    /**
     * @param string $sessionId
     * @param EntryModel $entry
     */
    private function registerSessionForEntry($sessionId, EntryModel $entry)
    {
        $model = new VisitsCountField_VisitsCountHistoryModel();
        $model->setAttributes([
            'entry' => $entry,
            'sessionId' => $sessionId
        ]);
        if ($model->validate()) {
            $record = new VisitsCountField_VisitsCountHistoryRecord();
            $record->entry = $model->entry->id;
            $record->sessionId = $model->sessionId;
            if (!$record->save()) {
                VisitsCountFieldPlugin::log(
                    sprintf('Cannot save visists count history record; %s', print_r($record->getErrors(), true))
                );
            }
        }
    }
}