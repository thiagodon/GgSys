<?php

class paroquias extends xajaxResponse{
	private $_c;
	private $con;
	private $smarty;
	private $p1;
	private $p2;
	private $arquivo='control/cadastro/paroquias/paroquias';
	private $class='paroquias';

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
		$tpl=$this->smarty->fetch('views/templates/cadastro/paroquias/base.tpl');
		$s=$this->smarty->fetch('views/templates/cadastro/paroquias/base.js');
		$this->assign('divCentro', 'innerHTML', $tpl);
		$this->script($s);
		$this->listar();
	}

	public function listar(){
		try{
		$_v=$this->p1;
		$valor='';
		if (!empty($_v)){
			$valor=sprintf("AND (nome LIKE '%%%s%%' OR fundador LIKE '%%%1\$s%%' OR descricao LIKE '%%%1\$s%%' OR estado LIKE '%%%1\$s%%' OR cidade LIKE '%%%1\$s%%')", $_v);
		}
		$sql=sprintf("SELECT id, ativo, codigo, 
								IF(paroquia_id=0,
									'Matriz',
									(SELECT pa.nome FROM paroquias pa WHERE pa.id = p.paroquia_id)									
								) as 'paroquia_id', 
								IF(tipo='p', 
									'Par&oacute;quia',
									'Comunidade'
								) as 'tipo', 
								nome, 
								DATE_FORMAT(data_fundacao, '%%d/%%m/%%Y') as 'data_fundacao', DATE_FORMAT(data_padroeiro, '%%d/%%m/%%Y') as 'data_padroeiro', 
								fundador, 
								IF(descricao='0',
									'',
									CONCAT('<a href=\"\" id=\"btnDesc\" rel=\"',id,'\"><img src=\"imagens/listar.png\"/></a>')
								) as 'descricao', 
								endereco, numero, complemento, cep, bairro, cidade, estado, telefone, 
								fax, email, usuario_in, data_in, usuario_up, data_up, 
								del, usuario_del, data_del FROM paroquias p WHERE del<>'s' %s",$valor);
		$this->alert($sql);
		if (!($rs=$this->con->Execute($sql))){
			throw new Exception("Erro buscar dados de UF");
		} 
		while (!$rs->EOF) {
			$dados[]=$rs->fields; 
			$rs->MoveNext();
		}
		$this->smarty->assign('dados', $dados);
		$tpl=$this->smarty->fetch('views/templates/cadastro/paroquias/listar.tpl');
		$s=$this->smarty->fetch('views/templates/cadastro/paroquias/listar.js');
		$this->assign('divForm', 'innerHTML', $tpl);
		$this->script($s);
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}
	public function editar(){
		try {
			$editar = (empty($this->p1) ? 0 : 1 );
			if ($editar){
				$sql="SELECT id, ativo, codigo, paroquia_id, tipo, nome, data_fundacao, 
								data_padroeiro, fundador, descricao, endereco, numero, 
								complemento, cep, bairro, cidade, estado, telefone, 
								fax, email, usuario_in, data_in, usuario_up, data_up, 
								del, usuario_del, data_del 
								FROM paroquias WHERE id=?";
				$sql=$this->con->Prepare($sql);
				if (!($rs=$this->con->Execute($sql, $this->p1))){
					throw new Exception("Erro buscar dados de UF");
				} 
				$dados=$rs->fields;
			}

			$dados['paroquias']=$this->carregarParoquias();			
			$dados['ufs']=$this->carregarUfs();			
			$this->smarty->assign('dados', $dados);
			
			$tpl=$this->smarty->fetch('views/templates/cadastro/paroquias/form.tpl');
			$s=$this->smarty->fetch('views/templates/cadastro/paroquias/form.js');
			$this->assign('divForm', 'innerHTML', $tpl);
			$this->script($s);
		} catch (Exception $e) {
			$this->alert($e->getMessage());
		}
	}
	public function carregarCidades(){
		try {
			$sql=sprintf("SELECT cod_cidades, nome FROM cidades WHERE estados_cod_estados=(SELECT cod_estados FROM estados WHERE nome='%s')", $this->p1);
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
	public function carregarUfs(){
			$sql="SELECT cod_estados, nome FROM estados";
			if (!($rs=$this->con->Execute($sql))){
				throw new Exception("Erro ao buscar Cidades");
			}
			while (!$rs->EOF) {
				$s.="<option value='".$rs->fields['nome']."'>".$rs->fields['nome']."</option>";
				$rs->MoveNext();
			}
			return $s;
	}

	public function carregarParoquias(){
		$sql=sprintf("SELECT id, nome FROM paroquias");
		if (!($rs=$this->con->Execute($sql))){
			throw new Exception("Erro ao buscar Cidades");
		}
		// $s='<select name="'.$this->p2.'"><option>Selecione</option>';
		while (!$rs->EOF) {
			$s.="<option value='".$rs->fields['id']."'>".$rs->fields['nome']."</option>";
			$rs->MoveNext();
		}
		return $s;		
	}

	public function salvar(){
		$dados=$this->p1;
		// $this->alert(print_r($this->p1,1));
		// return;
		try {
			if ($dados['tipo']=='p'){
				$dados['paroquia_id']='0';
			}else{
				if (empty($dados['paroquia_id'])){
					throw new Exception("Selecione uma matriz", 1);
				}
			}

			$dados['usuario_in']=$_SESSION['nome'];
			$dados['data_in']=date('Y-m-d');
			
			if (empty($dados['id'])){
				$op="INSERT INTO ";
				$where='';
				unset($dados['id']);
			}else{
				$op="UPDATE ";
				$where= " WHERE id=? ";
			}

			$sql=$op." paroquias SET tipo=?, paroquia_id=?, nome=?, data_fundacao=?, data_padroeiro=?, fundador=?, descricao=?, endereco=?, numero=?, complemento=?, cep=?, bairro=?, estado=?, cidade=?, telefone=?, fax=?, email=?, usuario_in=?, data_in=? ".$where;
			$sql=$this->con->Prepare($sql);
			if (!($rs=$this->con->Execute($sql, $dados))){
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
			$sql="UPDATE paroquias SET del=? WHERE id=?";
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
		$sql="UPDATE paroquias SET ativo=? WHERE id=?";
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