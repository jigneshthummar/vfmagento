<?php
class Elite_Vaf_Model_FlexibleSearchTests_FitYMMGlobalTest extends Elite_Vaf_TestCase
{
    function doSetUp()
    {
        $schemaGenerator = new Elite_Vaf_Model_Schema_Generator();
        $schemaGenerator->dropExistingTables();
        $schemaGenerator->execute(array(
            'year' => array('global'=>true),
            'make' => array('global'=>true),
            'model'
        ));
        $this->startTransaction();
    }
    
    function doTearDown()
    {
        $schemaGenerator = new Elite_Vaf_Model_Schema_Generator();
        $schemaGenerator->dropExistingTables();
    }
    
    function testTest()
    {
        $vehicle1 = $this->createVehicle('2000','Toyota','Base');
        $vehicle2 = $this->createVehicle('1991','Toyota','Base');
        
        $this->insertMappingMMY($vehicle1, 1);
        $this->insertMappingMMY($vehicle2, 1);
        
        $this->setRequestParams($vehicle1->toValueArray());
        $this->assertEquals( $vehicle1->toValueArray(), Elite_Vaf_Helper_Data::getInstance()->getFit()->toValueArray() );
    }
}