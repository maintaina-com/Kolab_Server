<?php
/**
 * Test the search operations restricted to groups.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Require our basic test case definition
 */
require_once __DIR__ . '/../../../../TestCase.php';

/**
 * Test the search operations restricted to groups.
 *
 * Copyright 2009-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */
class Horde_Kolab_Server_Class_Server_Search_Operation_RestrictgroupsTest
extends Horde_Kolab_Server_TestCase
{
    public function setUp()
    {
        $this->structure = $this->getMock('Horde_Kolab_Server_Structure_Interface');
    }

    public function testMethodSearchrestrictgroupsHasResultRestrictedToGroups()
    {
        $result = $this->getMock('Horde_Kolab_Server_Result_Interface');
        $result->expects($this->once())
            ->method('asArray')
            ->will($this->returnValue(array('a' => 'a')));
        $this->structure->expects($this->once())
            ->method('find')
            ->with(
                $this->isRestrictedToGroups(),
                array('attributes' => 'guid')
            )
            ->will($this->returnValue($result));
        $search = new Horde_Kolab_Server_Search_Operation_Restrictgroups($this->structure);
        $criteria = $this->getMock('Horde_Kolab_Server_Query_Element_Interface');
        $this->assertEquals(array('a'), $search->searchRestrictGroups($criteria));
    }
}