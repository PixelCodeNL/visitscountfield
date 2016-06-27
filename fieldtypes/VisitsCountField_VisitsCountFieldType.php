<?php

namespace Craft;

class VisitsCountField_VisitsCountFieldType extends BaseFieldType
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('Visits count');
    }

    /**
     * @return mixed
     */
    public function defineContentAttribute()
    {
        return AttributeType::Number;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if (!$value) {
            $value = new VisitsCountField_VisitsCountModel();
        }

        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

        $jsonVars = array(
            'id' => $id,
            'name' => $name,
            'namespace' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId(""),
        );

        $jsonVars = json_encode($jsonVars);
        craft()->templates->includeJs("$('#{$namespacedId}').VisitsCountField_VisitsCountFieldType(" . $jsonVars . ");");

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'value' => $value
        );

        return craft()->templates->render('visitscountfield/fields/VisitsCountField_VisitsCountFieldType.twig',
            $variables);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
        return $value;
    }
}