<?php

class usuarios extends xajaxResponse{
	private $_c;
	private $con;
	private $smarty;
	private $p1;
	private $p2;
	private $arquivo='control/cadastro/usuarios/usuarios';
	private $class='usuarios';

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
		$tpl=$this->smarty->fetch('views/templates/cadastro/usuarios/base.tpl');
		$s=$this->smarty->fetch('views/templates/cadastro/usuarios/base.js');
		$this->assign('divCentro', 'innerHTML', $tpl);
		$this->script($s);
		$this->listar();
	}

	public function listar(){
		$_v=$this->p1;
		$valor='';
		if (!empty($_v)){
			$valor=sprintf("AND (login LIKE '%%%s%%' OR nome LIKE '%%%1\$s%%' OR email LIKE '%%%1\$s%%')", $_v);
		}
		$sql=sprintf("SELECT id, ativo, login, senha, nome, email, telefone, celular1 FROM usuarios WHERE del<>'s' %s",$valor);
		if (!($rs=$this->con->Execute($sql))){
			throw new Exception("Erro buscar dados de UF");
		} 
		while (!$rs->EOF) {
			$dados[]=$rs->fields;
			$rs->MoveNext();
		}
		$this->smarty->assign('dados', $dados);
		$tpl=$this->smarty->fetch('views/templates/cadastro/usuarios/listar.tpl');
		$s=$this->smarty->fetch('views/templates/cadastro/usuarios/listar.js');
		$this->assign('divForm', 'innerHTML', $tpl);
		$this->script($s);
	}
	public function editar(){
		try {
			$editar = (empty($this->p1) ? 0 : 1 );
			if ($editar){	
				$sql="SELECT id, ativo, login, senha, nome, email, telefone, celular1 FROM usuarios WHERE del<>'s' AND id=?";
				$sql=$this->con->Prepare($sql);
				if (!($rs=$this->con->Execute($sql, $this->p1))){
					throw new Exception("Erro buscar dados de UF");
				} 
				while (!$rs->EOF) {
					$dados=$rs->fields;
					$rs->MoveNext();
				}
			}
			
			$this->smarty->assign('dados', $dados);
			
			$tpl=$this->smarty->fetch('views/templates/cadastro/usuarios/form.tpl');
			$s=$this->smarty->fetch('views/templates/cadastro/usuarios/form.js');
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
		// $this->alert(print_r($this->p1,1));
		try {
			$dados=$this->p1;

			if(!empty($dados['login']) && !empty($dados['senha'])){
				$dados['senha']=md5($dados['login'].$dados['senha']);
			}
			$_d['ativo']=$dados['ativo'];
			$_d['login']=$dados['login'];
			$_d['senha']=$dados['senha'];
			$_d['nome']=$dados['nome'];
			$_d['email']=$dados['email'];
			$_d['telefone']=$dados['telefone'];
			$_d['celular1']=$dados['celular1'];

			if (empty($dados['id'])){
				$op="INSERT INTO ";
				$where='';
				unset($_d['id']);
			}else{
				$op="UPDATE ";
				$where= " WHERE id=? ";
				$_d['id']=$dados['id'];
			}

			$sql=$op." usuarios SET ativo=?, login=?, senha=?, nome=?, email=?, telefone=?, celular1=? ".$where;
			$sql=$this->con->Prepare($sql);
			if (!($rs=$this->con->Execute($sql, $_d))){
				throw new Exception("Erro ao buscar Cidades");
			}
			$this->alert("Salvo com sucesso!");
			$this->script("$('#btnAdicionar').click();");
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}

	public function excluir(){
		try{
			$sql="UPDATE usuarios SET del=? WHERE id=?";
			$sql=$this->con->Prepare($sql);
			$_d['del']='s';
			$_d['id']=$this->p1;
			if (!($rs=$this->con->Execute($sql, $_d))){
				throw new Exception("Erro ao buscar Cidades");
			}
			$this->p1='';
			$this->alert("Excluido com sucesso!");
			$this->listar();

		}catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}

	public function ativo(){
		$sql="UPDATE usuarios SET ativo=? WHERE id=?";
			$sql=$this->con->Prepare($sql);
			if ($this->p2=='s'){
				$t='Desativado';
				$_d['ativo']='n';
			}else{
				$t='Ativado';
				$_d['ativo']='s';
			}
			$_d['id']=$this->p1;
			if (!($rs=$this->con->Execute($sql, $_d))){
				throw new Exception("Erro ao buscar Cidades");
			}
			$this->alert("$t com sucesso!");
			$this->p1='';
			$this->listar();
	}

}