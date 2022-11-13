<?php
/**
 * @copyright   2016 Milex, NP. All rights reserved.
 * @author      Milex
 *
 * @see        http://milex.org
 *
 * @license     MIT http://opensource.org/licenses/MIT
 */

namespace Milex\Api;

/**
 * Dynamiccontents Context.
 */
class DynamicContents extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'dynamiccontents';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'dynamicContents';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'dynamicContent';

    /**
     * {@inheritdoc}
     */
    protected $searchCommands = [
        'ids',
        'is:published',
        'is:unpublished',
        'is:mine',
        'is:uncategorized',
        'category',
        'lang',
    ];
}
