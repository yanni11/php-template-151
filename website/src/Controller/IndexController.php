<?php

namespace tsarov\Controller;

use tsarov\SimpleTemplateEngine;

class IndexController 
{
  /**
   * @var tsarov\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param tsarov\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template)
  {
     $this->template = $template;
  }

  public function homepage() {
  	
  	echo $this->template->render("base.html.php", ["contentFile" => "home.html.php"]);
  }
  
  

//   public function greet($name) {
//   	echo $this->template->render("base.html.php", [
//   		"contentFile" => "hello.html.php", 
//   		"name" => $name	
//   	]);
//   }
  
}
