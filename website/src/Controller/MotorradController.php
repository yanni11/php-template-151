<?php

namespace tsarov\Controller;

use tsarov\SimpleTemplateEngine;
use tsarov\Service\MotorradService;

class MotorradController 
{
  /**
   * @var tsarov\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param tsarov\SimpleTemplateEngine
   */
  
  private $motorradService;
  
  
  public function __construct(SimpleTemplateEngine $template, MotorradService $service)
  {
     $this->template = $template;
     $this->motorradService = $service;
  }

  public function catalog()
  {  	
  	$model = $this->motorradService->getMotorrader();
  	echo $this->template->render("base.html.php", ["contentMidFile" => "catalog.html.php", "model" => $model]);
  }
  
}
