<?php

class login extends xajaxResponse{
	private $_c;
	private $con;
	private $smarty;
	private $p1;
	private $p2;
	private $arquivo='control/login';
	private $class='login';

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
		if (isset($_SESSION['nome'])){
			$this->menu($_SESSION['id']);
			$tpl=$this->smarty->fetch('views/templates/base.tpl');
			$s=$this->smarty->fetch('views/templates/base.js');
		}else{
			$tpl=$this->smarty->fetch('views/templates/login.tpl');
			$s=$this->smarty->fetch('views/templates/login.js');
		}
		$this->assign('divCentro', 'innerHTML', $tpl);
		$this->script($s);
	}
	public function logar(){
		try {
			$sql="SELECT id, nome, email FROM usuarios WHERE  login=? and senha=? and ativo=? and del=?;";
			$sql = $this->con->Prepare($sql);
			if (!$rs=$this->con->Execute($sql, array($this->p1['login'], md5($this->p1['senha']), 's', 'n') )){
				throw new Exception("Login Inválido. Tente novamente");
			}
			if ($rs->_numOfRows==1){
				$_SESSION['id']=$rs->fields['id'];
				$_SESSION['login']=$rs->fields['login'];
				$_SESSION['nome']=$rs->fields['nome'];
				$_SESSION['email']=$rs->fields['email'];
				$_SESSION['loginem']=date('Y-m-d H:i:s');
				$this->menu($rs->fields['id']);
			}else{
				throw new Exception("Login Inválido. Contate o administrador do sistema");
				
			}
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}

	function sair(){
		unset($_SESSION['id']);
		unset($_SESSION['login']);
		unset($_SESSION['nome']);
		unset($_SESSION['email']);
		unset($_SESSION['loginem']);
		$s = "$('#divTopo').removeClass('cTopo');
				$('#divTopo').html('');
				$('#divMenu').html('');
				$('#divCentro').html('');
				$('#divDialogo').html('');
				$('#divRodape').html('');";
		$this->script($s);
		$tpl=$this->smarty->fetch('views/templates/login.tpl');
		$s=$this->smarty->fetch('views/templates/login.js');
		$this->assign('divCentro', 'innerHTML', $tpl);
		$this->script($s);
	}

	function menu($us=false){
		try {
			// $sql="SELECT pu_mn_id, mn_titulo, mn_id, mn_mn_id, pu_permissao FROM iw_pu INNER JOIN iw_mn ON mn_id=pu_mn_id WHERE pu_us_id='%s' and pu_permissao > 1";
			// $sql=sprintf($sql, $us);
			// if (!$rs=$this->con->Execute($sql)){
			// 	throw new Exception("Erro ao buscar menus");
			// }

			// while (!$rs->EOF) {
			// 	if (empty($rs->fields['mn_mn_id'])){
			// 		$menu[$rs->fields['pu_mn_id']]['menu']=$rs->fields['mn_titulo'];
			// 	}else{
			// 		$menu[$rs->fields['mn_mn_id']]['submenu'][$rs->fields['mn_id']]=$rs->fields['mn_titulo'];
			// 	}
			// 	$rs->MoveNext();
			// }
			$dados['usuario']=$_SESSION['nome'];
			$dados['data']=date('d/m/Y');
			$this->smarty->assign('menu', $this->_c['menu']);
			$this->smarty->assign('dados', $dados);
			// $this->alert(print_r($this->_c['menu'],1));

			$s = "$('#divTopo').addClass('cTopo');";
			$this->script($s);


			$tpl=$this->smarty->fetch('views/templates/topo.tpl');
			$s=$this->smarty->fetch('views/templates/topo.js');
			$this->assign('divTopo', 'innerHTML', $tpl);
			$this->script($s);

			$tpl=$this->smarty->fetch('views/templates/menu.tpl');
			$s=$this->smarty->fetch('views/templates/menu.js');
			$this->assign('divMenu', 'innerHTML', $tpl);
			$this->script($s);

			$tpl=$this->smarty->fetch('views/templates/base.tpl');
			$s=$this->smarty->fetch('views/templates/base.js');
			$this->assign('divCentro', 'innerHTML', $tpl);
			$this->script($s);
			
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}

}
