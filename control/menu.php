<?php

class menu extends xajaxResponse{
	private $_c;
	private $con;
	private $smarty;
	private $p1;
	private $p2;
	private $arquivo='control/menu';
	private $class='menu';

	function __construct($_c, $con, $smarty, $p1, $p2){
		$this->_c 		= &$_c;
		$this->con 		= &$con;
		$this->smarty 	= &$smarty;
		$this->p1 		= &$p1;
		$this->p2 		= &$p2;
		$this->smarty->assign('arquivo', $this->arquivo);
		$this->smarty->assign('class', $this->class);
	}
	public function chamar(){
		try {
			$arquivo='control/'.$this->p1;
			$_class=explode('/',  $this->p1);
			$class=$_class[2];
			$funcao='base';
			$this->script("xajax_Funcoes('$arquivo', '$class', '$funcao','','');");
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}
	

}
