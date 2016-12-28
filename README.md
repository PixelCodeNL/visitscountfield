# Visits count field plugin for Craft CMS

Add a field type for storing the visits count for a entry.

## Installation

To install Visits count field, follow these steps:

1. Download & unzip the file and place the `visitscountfield` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/jordypixelcode/visitscountfield.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require jordypixelcode/visitscountfield`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `visitscountfield` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Visits count field works on Craft 2.4.x and Craft 2.5.x.

## Visits count field Overview

With this plugin you can add a visitors count field to a section. The visits count will be stored in the entry's content, so you can use it in the craft.entries tag.

## Configuring Visits count field

Add a field with type 'Visits count' to the sections you want to track. The field is just a disabled number field which stores the view counter.

## Using Visits count field

Add the following code on the entry details page to increment the number:

```
{% do craft.visitsCountField.increment(entry) %}
```

Without the tag above the number will not increment, so you can add your own if-else statements if you want.
The number will increment only once for the stored session ID, so refreshing the page will not increment the number.

To show the visits count, you can render your own custom field by using the handle:

```
{{ entry.visitsCount }}
```

## Visits count field Roadmap

* Reset visits count for a single entry
* Reset all visits for a section
* Reset all visits
* Clear session IDs in visit count history

Feel free to request any or fork this repo.

## Visits count field Changelog

### 1.0.0 -- 2016.06.28

* Initial release

### 1.0.1 -- 2016.06.28

* Bugfix: javascript error fixed

### 1.0.2 -- 2016.12.28

* Bugfix: crash live preview, see https://github.com/jordypixelcode/visitscountfield/pull/1

Brought to you by [Jordy Versmissen](http://www.pixelcode.nl)
