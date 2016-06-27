<?php
/**
 * Visits count field plugin for Craft CMS
 *
 * VisitsCountField_VisitsCount Model
 *
 * @author    Jordy Versmissen
 * @copyright Copyright (c) 2016 Jordy Versmissen
 * @link      http://www.pixelcode.nl
 * @package   VisitsCountField
 * @since     1.0.0
 */

namespace Craft;

class VisitsCountField_VisitsCountModel extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'someField'     => array(AttributeType::String, 'default' => 'some value'),
        ));
    }

}