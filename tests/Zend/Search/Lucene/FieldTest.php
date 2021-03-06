<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Search_Lucene
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * @namespace
 */
namespace ZendTest\Search\Lucene;
use Zend\Search\Lucene\Document;

/**
 * Zend_Search_Lucene_Field
 */

/**
 * PHPUnit test case
 */

/**
 * @category   Zend
 * @package    Zend_Search_Lucene
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @group      Zend_Search_Lucene
 */
class FieldTest extends \PHPUnit_Framework_TestCase
{
    public function testBinary()
    {
        $field = Document\Field::Binary('field', 'value');

        $this->assertEquals($field->boost, 1);
        $this->assertEquals($field->encoding, '');
        $this->assertEquals($field->isBinary,    true);
        $this->assertEquals($field->isIndexed,   false);
        $this->assertEquals($field->isStored,    true);
        $this->assertEquals($field->isTokenized, false);

        $this->assertEquals($field->name, 'field');
        $this->assertEquals($field->value, 'value');
    }

    public function testKeyword()
    {
        $field = Document\Field::Keyword('field', 'value');

        $this->assertEquals($field->boost, 1);
        $this->assertEquals($field->encoding, '');
        $this->assertEquals($field->isBinary,    false);
        $this->assertEquals($field->isIndexed,   true);
        $this->assertEquals($field->isStored,    true);
        $this->assertEquals($field->isTokenized, false);

        $this->assertEquals($field->name, 'field');
        $this->assertEquals($field->value, 'value');
    }

    public function testText()
    {
        $field = Document\Field::Text('field', 'value');

        $this->assertEquals($field->boost, 1);
        $this->assertEquals($field->encoding, '');
        $this->assertEquals($field->isBinary,    false);
        $this->assertEquals($field->isIndexed,   true);
        $this->assertEquals($field->isStored,    true);
        $this->assertEquals($field->isTokenized, true);

        $this->assertEquals($field->name, 'field');
        $this->assertEquals($field->value, 'value');
    }

    public function testUnIndexed()
    {
        $field = Document\Field::UnIndexed('field', 'value');

        $this->assertEquals($field->boost, 1);
        $this->assertEquals($field->encoding, '');
        $this->assertEquals($field->isBinary,    false);
        $this->assertEquals($field->isIndexed,   false);
        $this->assertEquals($field->isStored,    true);
        $this->assertEquals($field->isTokenized, false);

        $this->assertEquals($field->name, 'field');
        $this->assertEquals($field->value, 'value');
    }

    public function testUnStored()
    {
        $field = Document\Field::UnStored('field', 'value');

        $this->assertEquals($field->boost, 1);
        $this->assertEquals($field->encoding, '');
        $this->assertEquals($field->isBinary,    false);
        $this->assertEquals($field->isIndexed,   true);
        $this->assertEquals($field->isStored,    false);
        $this->assertEquals($field->isTokenized, true);

        $this->assertEquals($field->name, 'field');
        $this->assertEquals($field->value, 'value');
    }

    public function testEncoding()
    {
        $field = Document\Field::Text('field', 'Words with umlauts: ���...', 'ISO-8859-1');

        $this->assertEquals($field->encoding, 'ISO-8859-1');

        $this->assertEquals($field->name, 'field');
        $this->assertEquals($field->value, 'Words with umlauts: ���...');
        $this->assertEquals($field->getUtf8Value(), 'Words with umlauts: åãü...');
    }
}

