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
  	
  	$this->renderpage("home.html.php");
    //echo "INDEX";
  }
  
  

//   public function greet($name) {
//   	echo $this->template->render("base.html.php", [
//   		"contentFile" => "hello.html.php", 
//   		"name" => $name	
//   	]);
//   }
  
  public function renderpage($page) {
  	echo $this->template->render("base.html.php", ["contentMidFile" => $page]);
  }
  
}
