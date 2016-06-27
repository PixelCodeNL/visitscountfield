<?php
/**
 * Visits count field plugin for Craft CMS
 *
 * VisitsCountField_VisitsCount FieldType
 *
 * @author    Jordy Versmissen
 * @copyright Copyright (c) 2016 Jordy Versmissen
 * @link      http://www.pixelcode.nl
 * @package   VisitsCountField
 * @since     1.0.0
 */

namespace Craft;

class VisitsCountField_VisitsCountFieldType extends BaseFieldType
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('VisitsCountField_VisitsCount');
    }

    /**
     * @return mixed
     */
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if (!$value)
            $value = new VisitsCountField_VisitsCountModel();

        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

/* -- Include our Javascript & CSS */

        craft()->templates->includeCssResource('visitscountfield/css/fields/VisitsCountField_VisitsCountFieldType.css');
        craft()->templates->includeJsResource('visitscountfield/js/fields/VisitsCountField_VisitsCountFieldType.js');

/* -- Variables to pass down to our field.js */

        $jsonVars = array(
            'id' => $id,
            'name' => $name,
            'namespace' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId(""),
            );

        $jsonVars = json_encode($jsonVars);
        craft()->templates->includeJs("$('#{$namespacedId}').VisitsCountField_VisitsCountFieldType(" . $jsonVars . ");");

/* -- Variables to pass down to our rendered template */

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'values' => $value
            );

        return craft()->templates->render('visitscountfield/fields/VisitsCountField_VisitsCountFieldType.twig', $variables);
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