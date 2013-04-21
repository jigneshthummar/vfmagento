<?php
class Elite_Vaflogo_Block_ListMMYTest extends Elite_Vaf_TestCase
{

    function doSetUp()
    {
	$this->switchSchema('make,model,year');
    }

    function testShouldListMakes()
    {
	$vehicle1 = $this->createVehicle(array('make'=>'Honda', 'model'=>'Civic', 'year'=>2000));
	$vehicle2 = $this->createVehicle(array('make'=>'Acura', 'model'=>'Integra', 'year'=>2000));

	$block = new Elite_Vaflogo_Block_List;

	$expected = '<ul><li><a href="?make=' . $vehicle2->getValue('make') . '"><img src="/logos/ACURA.jpg" /></a></li>';
	$expected .= '<li><a href="?make=' . $vehicle1->getValue('make') . '"><img src="/logos/HONDA.jpg" /></a></li></ul>';

	$this->assertEquals($expected, $block->_toHtml() );
    }
}