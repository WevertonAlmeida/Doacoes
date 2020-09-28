<?php
require_once('conexao.php'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['Consulta'])){
    $Method = $_POST['Consulta'];
    $Erro = "Erro"; 
  
  switch ($Method){

    case 'inserirDoacao': 
		
		$nomeCompleto = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$dtNascimento = $_POST['dtnascimento'];
		$email = $_POST['email'];		
		$telefoneCelular = $_POST['celular'];
		$telefoneFixo = $_POST['fixo'];
		$enderecoCompleto = $_POST['endereco'];
		$dtCadastro = $_POST['dtcadastro'];
		$intervalo = $_POST['intervalo'];
		$valor = $_POST['valor'];
		$formaPagamento = $_POST['pagamento'];       
          
          $sql = "INSERT INTO cad_cadastro_doadores (cad_cadastro_doadores_id, cad_nome, cad_cpf, cad_dtnascimento, cad_email, cad_celular, cad_telfixo, cad_endereco, cad_intervalo, cad_valor, cad_dtcadastro, cad_forma_pagamento_id)
                   VALUES ('', '".$nomeCompleto."', '".$cpf."', '".$dtNascimento."', '".$email."', '".$telefoneCelular."', '".$telefoneFixo."', '".$enderecoCompleto."', '".$intervalo."', '".$valor."', '".$dtCadastro."', '".$formaPagamento."')";

          if ($conn->query($sql) === TRUE) {
			  echo "true";
          } else {
              echo "Erro SQL: " . "<br>" . $conn->error;
          }        

        $conn->close();
    break;
	
	case 'inserirFormaPagamento': 
		
		$nomeFormaPagamento = $_POST['nomeFormaPagamento'];          
          
        $sql = "INSERT INTO fop_forma_pagamento (fop_forma_pagamento_id, fop_forma)
                VALUES ('', '".$nomeFormaPagamento."')";

        if ($conn->query($sql) === TRUE) {
			echo "true";
        } else {
            echo "Erro SQL: " . "<br>" . $conn->error;
        }         

        $conn->close();
    break;
	
	case 'ListarDoacoes':      
        
        $query = "SELECT cad_cadastro_doadores_id, cad_nome, cad_email, cad_cpf, cad_dtnascimento FROM cad_cadastro_doadores";
        $result = $conn->query($query);

        $total_num_rows = $result->num_rows;                       
        
        if($total_num_rows > 0){          
            while($row = $result->fetch_array()){
              $id = $row['cad_cadastro_doadores_id'];

              $Html  = '<tr>
							<td>'.$row["cad_cadastro_doadores_id"].'</td>
							<td>'.$row["cad_nome"].'</td>
							<td>'.$row["cad_email"].'</td>
							<td>'.$row["cad_cpf"].'</td>
							<td>'.$row["cad_dtnascimento"].'</td>
						</tr>';              
			  
              echo $Html;
            } 
        }else{                 
            $Html = "Não há doações cadastrado!";          

            echo $Html;
        }
                    
    break;
	
	case 'ConsultaFormaPagamento':      
        
        $query = "SELECT fop_forma_pagamento_id, fop_forma FROM fop_forma_pagamento";
        $result = $conn->query($query);

        $total_num_rows = $result->num_rows;  
        
        echo "<option>Selecione...</option>";		
        
        if($total_num_rows > 0){          
            while($row = $result->fetch_array()){
              $id = $row['fop_forma_pagamento_id'];

              $Html  = '<option value="'.$id.'">'.$row['fop_forma'].'</option>';              
			  
              echo $Html;
            } 
        }else{                 
            $Html = "Não há forma cadastrada!";          

            echo $Html;
        }
                    
    break;

  }      
}

?>