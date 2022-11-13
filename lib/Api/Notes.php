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
 * Notes Context.
 */
class Notes extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'notes';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'notes';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'note';

    /**
     * {@inheritdoc}
     */
    protected $searchCommands = [
        'ids',
    ];
}
