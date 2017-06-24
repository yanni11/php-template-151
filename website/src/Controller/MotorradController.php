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

  public function catalog($modelId = 0, $typeId = 0)
  {  	
  	$motorrader = $this->motorradService->getMotorrader($modelId, $typeId);
  	//var_dump($motorrader); die();
  	$types = $this->motorradService->getTypes();
  	$models = $this->motorradService->getModels();
  	
  	$title = "Catalog > ";
  	if ($modelId == 0)
  	{
  		$title .= "All Models";
  	}
  	else 
  	{
  		$title .= $models[$modelId]->Name;
  	}
  	$title .= " > ";
  	if ($typeId == 0)
  	{
  		$title .= "All Types";
  	}
  	else
  	{
  		$title .=  $types[$typeId]->Name;
  	}
  	echo $this->template->render("base.html.php", [
  			"contentFile" => "catalog.html.php", 
  			"motorrader" => $motorrader,
  			"types" => $types,
  			"models" => $models,
  			"title" => $title
  	]);
  }
  
  public function motorrad()
  {
  	$model = $this->motorradService->getMotorrad();
  	echo $this->template->render("base.html.php", [
  			"contentMidFile" => "motorrad.html.php", 
  			"model" => $model]
  		);
  }
  
}
