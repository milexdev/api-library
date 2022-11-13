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
 * Tags Context.
 */
class Tags extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'tags';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'tags';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'tag';
}
