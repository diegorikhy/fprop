<?php


/**
 * Verifica se um usuario esta logado. Retorna TRUE para um usuario logado e FALSE para usuario que nao esta autenticado no sistema  
 *
 * Exempplo de utilizacao:
 *
 * if( is_auth() )
 * {
 * 	 // usuario autenticado no sistema
 * }
 * 
 * @return array
 */
function is_auth()
{
	// # instancia do codeIgniter 
	$ci =& get_instance();
	
	// # resgatando os valores que sao gravados na sessao do usuario quando autenticado. 
	$idUsuario 		= $ci->session->userdata('idUsuario');
	$autenticado 	= $ci->session->userdata('autenticado');
	$token 			= $ci->session->userdata('token');
	
	// # caso algum dos itens nao sejam validos redireciona para a tela de login 
	if( is_null( $idUsuario ) )
	{
		redirect(base_url() . 'login/cLogin/login', 'refresh');
	}
	else if( is_null( $autenticado ) || !$autenticado )
	{
		redirect(base_url() . 'login/cLogin/login', 'refresh');
	}
	else if( is_null( $token ) || $token != 't7nr' )
	{
		redirect(base_url() . 'login/cLogin/login', 'refresh');
	} 
	else
	{
		// # usuario logado no sistema, nao precisa de nenhuma acao. 
		// # no  momento do login ele ja e redirecionado para a pagina inicial.
		
	}
		
}


/**
 * Gera um codigo de seguranca com 4 letras. 
 * 
 * Exempplo de utilizacao:
 * 
 * $captcha = captcha(); 
 * $captcha['cap_word']; // cadeia de caracteres para guardar na sessao do usuario. Sera utilizado no backend
 * $captcha['cap_image']; // string que contem a tag img completa para ser colocado no HTML
 * 
 * @return array
 */
function captcha()
{
	/* CAPTCHA */
	$ci =& get_instance();
	$ci->load->helper('captcha');

	$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => 78,
			'img_height' => 33,
			'expiration' => 3600
	);

	$cap = create_captcha( $vals );

	return array('cap_image' => $cap['image'] , 'cap_word' => $cap['word'] );
}

function pre( $arg )
{
	if( is_null( $arg ) )
	{
		echo '<pre>';
			var_dump( $arg ); 
		echo '</pre>';
	}
	else
	{
		echo '<pre>';
			print_r( $arg ); 
		echo '</pre>';
	}
}

function arrayToSelect( $arr = array() , $nomeChave = '', $nomeValor = '')
{
	$arraySelect = array(); 
	$arraySelect[''] = '--';
	if( is_array( $arr ) && count( $arr ) > 0 )
	{
		foreach( $arr as $array )
		{
			$arraySelect[ $array[$nomeChave] ] = $array[$nomeValor];   
		}
	}
	
	return $arraySelect; 
}

/**
 * Cria uma array com a mensagem e o tipo com o retorno do tipo json para um alert no js do modulo 
 */
function ajaxAlert( $message, $type = SUCCESS )
{
	$dados = array(); 
	$dados['verifica'] = $type;
	$dados['message'] = $message;
	echo json_encode( $dados );
	exit();
}


/**
 * Recebe a mensagem $str e mostra em um alert javascript
 * @param string $str
 */
function alert( $str = '', $tipo )
{
	if( !empty( $str ) )
	{
		$alert = 
		'
			<div class="alert alert-'.$tipo.'" hide">
				<button class="close" data-dismiss="alert"></button>
				<span>'.$str.'</span>
			</div>
		';
		
		return $alert; 
	}
	
	return false; 
}