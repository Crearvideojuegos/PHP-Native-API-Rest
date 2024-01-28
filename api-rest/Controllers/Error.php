<?php

    class Errors extends Controllers
    {
        public function __construct()
		{
			parent::__construct();
		}

        public function NotFound()
		{
			$this->views->GetView($this, 'error');
		}
    }

    $notFound = new Errors();
	$notFound->NotFound();


?>