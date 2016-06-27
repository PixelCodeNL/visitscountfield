<?php
/**
 * Visits count field plugin for Craft CMS
 *
 * Add a field type for storing the visits count for a entry.
 *
 * @author    Jordy Versmissen
 * @copyright Copyright (c) 2016 Jordy Versmissen
 * @link      http://www.pixelcode.nl
 * @package   VisitsCountField
 * @since     1.0.0
 */

namespace Craft;

class VisitsCountFieldPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Visits count field');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Add a field type for storing the visits count for a entry.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/jordypixelcode/visitscountfield/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/jordypixelcode/visitscountfield/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Jordy Versmissen';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://www.pixelcode.nl';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }
}