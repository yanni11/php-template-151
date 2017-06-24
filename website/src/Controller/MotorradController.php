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
  	
  	$title = "Catalog > " . $models[$modelId]->Name . " > " . $types[$typeId]->Name;
  	
  	echo $this->template->render("base.html.php", [
  			"contentFile" => "catalog.html.php", 
  			"motorrader" => $motorrader,
  			"types" => $types,
  			"models" => $models,
  			"title" => $title
  	]);
  }
  
  public function motorrad($id)
  {
  	$motorrad = $this->motorradService->getMotorrad($id);
  	$comments = $this->motorradService->getComments($id);

  	echo $this->template->render("base.html.php", [
  			"contentFile" => "motorrad.html.php", 
  			"motorrad" => $motorrad,
  			"comments" => $comments]
  		);
  	
  }
  public function Comment($data)
  {
  	$this->motorradService->postComment($data);

  	$this->motorrad($_REQUEST["Id"]);
  	 
  }
  
}
