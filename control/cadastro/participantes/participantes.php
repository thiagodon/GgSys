<?php

class participantes extends xajaxResponse{
	private $_c;
	private $con;
	private $smarty;
	private $p1;
	private $p2;
	private $arquivo='control/cadastro/participantes/participantes';
	private $class='participantes';

	function __construct($_c, $con, $smarty, $p1, $p2){
		$this->_c 		= &$_c;
		$this->con 		= &$con;
		$this->smarty 	= &$smarty;
		$this->p1 		= &$p1;
		$this->p2 		= &$p2;
		$this->smarty->assign('arquivo', $this->arquivo);
		$this->smarty->assign('class', $this->class);
	}
	public function base(){
		$tpl=$this->smarty->fetch('views/templates/cadastro/participantes/base.tpl');
		$s=$this->smarty->fetch('views/templates/cadastro/participantes/base.js');
		$this->assign('divCentro', 'innerHTML', $tpl);
		$this->script($s);
		$this->listar();
	}
	public function listar(){
		$tpl=$this->smarty->fetch('views/templates/cadastro/participantes/listar.tpl');
		$s=$this->smarty->fetch('views/templates/cadastro/participantes/listar.js');
		$this->assign('divForm', 'innerHTML', $tpl);
		$this->script($s);
	}
	public function editar(){
		try {
			$sql="SELECT cod_estados, nome FROM estados";
			if (!($rs=$this->con->Execute($sql))){
				throw new Exception("Erro buscar dados de UF");
			} 
			while (!$rs->EOF) {
				$dados['ufs'][]=$rs->fields;
				$rs->MoveNext();
			}

			$this->smarty->assign('dados', $dados);
			
			$tpl=$this->smarty->fetch('views/templates/cadastro/participantes/form.tpl');
			$s=$this->smarty->fetch('views/templates/cadastro/participantes/form.js');
			$this->assign('divForm', 'innerHTML', $tpl);
			$this->script($s);
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}
	public function carregarCidades(){
		try {
			$sql=sprintf("SELECT cod_cidades, nome FROM cidades WHERE estados_cod_estados='%s'", $this->p1);
			if (!($rs=$this->con->Execute($sql))){
				throw new Exception("Erro ao buscar Cidades");
			}
			// $s='<select name="'.$this->p2.'"><option>Selecione</option>';
			while (!$rs->EOF) {
				$s.="<option value='".$rs->fields['nome']."'>".$rs->fields['nome']."</option>";
				$rs->MoveNext();
			}
			// $s.='</select>';
			// $this->script("$('#divcl_local_nascimento').html(".$s.")");
			$this->script("$('#div".$this->p2."').attr('name', '".$this->p2."');");
			$this->assign('div'.$this->p2, 'innerHTML', $s);
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}

	public function salvar(){
		$this->alert(print_r($this->p1,1));
	}
}