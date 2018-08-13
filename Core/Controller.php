<?php

namespace Core;

class Controller
{

	public function redirect($url)
	{
		header('Location: http://' . $_SERVER['HTTP_HOST'] . $url, true, 303);
		exit();
	}

}