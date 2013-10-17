<?php
/**
 * Vehicle Fits
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Vehicle Fits to newer
 * versions in the future. If you wish to customize Vehicle Fits for your
 * needs please refer to http://www.vehiclefits.com for more information.

 * @copyright  Copyright (c) 2013 Vehicle Fits, llc
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Elite_Vaf_Model_Catalog_ProductTests_ApplicationFitmentsTests_GlobalTest extends Elite_Vaf_Model_Catalog_ProductTests_TestCase
{
    function doSetUp()
    {
        $schemaGenerator = new VF_Schema_Generator();
        $schemaGenerator->dropExistingTables();
        $schemaGenerator->execute(array(
            'make' => array('global'=>true),
            'model',
            'year' => array('global'=>true)
        ));
        $this->startTransaction();
    }
    
    function doTearDown()
    {
        $schemaGenerator = new VF_Schema_Generator();
        $schemaGenerator->dropExistingTables();
    }
    
    function testWhenSameYearShouldAddCorrectFitment()
    {
        $vehicle1 = $this->createMMY('Honda', 'Civic', '2000');
        $vehicle2 = $this->createMMY('Ford', 'F-150', '2000');
        
        $product = $this->getProduct(1);
        $product->addVafFit($vehicle1->toValueArray());
        
        $this->assertTrue($product->fitsVehicle($vehicle1));
    }    

    function testWhenSameYearShouldAddCorrectFitment2()
    {
        $vehicle1 = $this->createMMY('Honda', 'Civic', '2000');
        $vehicle2 = $this->createMMY('Ford', 'F-150', '2000');

        $product = $this->getProduct(1);
        $product->addVafFit($vehicle2->toValueArray());

        $this->assertTrue($product->fitsVehicle($vehicle2));
    }

    function testWhenSameYearShouldNotAddIncorrectFitment()
    {
        $vehicle1 = $this->createMMY('Honda', 'Civic', '2000');
        $vehicle2 = $this->createMMY('Ford', 'F-150', '2000');
        
        $this->assertEquals($vehicle1->getValue('year'), $vehicle2->getValue('year'));
        
        $product = $this->getProduct(1);
        $product->addVafFit($vehicle1->toValueArray());
        
        $this->assertFalse($product->fitsVehicle($vehicle2));
    }
}