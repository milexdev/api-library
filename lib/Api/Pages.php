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
 * Pages Context.
 */
class Pages extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'pages';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'pages';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'page';

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
