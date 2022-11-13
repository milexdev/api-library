<?php
/**
 * @copyright   2014 Milex, NP. All rights reserved.
 * @author      Milex
 *
 * @see        http://milex.org
 *
 * @license     MIT http://opensource.org/licenses/MIT
 */

namespace Milex\Api;

/**
 * Notifications Context.
 */
class Notifications extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'notifications';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'notifications';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'notification';

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
