<?php
/**
 * Tinge
 */
class Action extends Api
{
    function index()
    {
        $this->display('settings.html');  
    }

    function create()
    {	
    	$result = $_POST['email'];
        echo $result;  
    }

}
?>