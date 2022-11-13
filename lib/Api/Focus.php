<?php
/*
 * @package     Milex
 * @copyright   2014 Milex, NP. All rights reserved.
 * @author      Milex
 * @link        http://milex.org
 * @license     MIT http://opensource.org/licenses/MIT
 */

namespace Milex\Api;

/*
 * Emails Context
 */
class Focus extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'focus';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'focus';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'focus';

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
    ];
}
