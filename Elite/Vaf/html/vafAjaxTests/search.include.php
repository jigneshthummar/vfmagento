<?php
class Elite_Vaf_Block_Search_AjaxTestSub extends Elite_Vaf_Block_Search
{
	function toHtml()
	{
		require_once('F:\dev\vaf\app\code\local\Elite\Vaf\design\frontend\default\default\template\vaf\search.phtml');
	}
	
	function __()
	{
		$args = func_get_args();
		return $args[0];
	}
	
	protected function url( $url )
    {
	}
    
    function htmlEscape( $string )
    {
        return htmlentities($string);
    }
    
}
$search = new Elite_Vaf_Block_Search_AjaxTestSub();
if( isset( $config) )
{
	$search->setConfig($config);
}
Elite_Vaf_Helper_Data::getInstance()->setRequest( new Zend_Controller_Request_Http() );
echo $search->toHtml();
