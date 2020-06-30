<?php
class View
{
    function generate($view_content, $view_template, $page_title=null, $resKlient=null, $resDill=null, $sumKlient=null, $sumDill=null, $result=null)
	{
        include 'application/views/'.$view_template;
    }
}