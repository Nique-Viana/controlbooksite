<?php
include_once("conexao.php");
$nome_usuario = $_POST['txt_nome_usuario'];
$email_usuario = $_POST['txt_email_usuario'];
//echo "$nome_usuario - $email_usuario";
$result_usuario = "INSERT INTO usuarios(nome, email) VALUES ('$nome_usuario','$email_usuario')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn) != 0){
            echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/aula/cadastro.php'>
                <script type="text/javascript">
                    alert("Usuario cadastrado com Sucesso.");
                </script>
            ";    
        }else{
            echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/aula/cadastro.php'>
                <script type="text/javascript">
                    alert("O Usuario não foi cadastrado com Sucesso.");
                </script>
            ";    
        }
?>
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.0
 */

/**
 * Database `projeto_tcc`
 */

/* `projeto_tcc`.`cadastrados` */
$cadastrados = array(
  array('nome' => 'Monique Viana','e-mail' => 'niquee.viana@hotmail.com','id' => '9171'),
  array('nome' => 'Nicolly Monteiro','e-mail' => '9193@colegio.cefsa.edu.br','id' => '9193'),
  array('nome' => 'Patrícia Farias','e-mail' => '9191@colegio.cefsa.edu.br','id' => '9191'),
  array('nome' => 'Melissa Eiko','e-mail' => '9217@colegio.cefsa.edu.br','id' => '9217'),
  array('nome' => 'Talia ','e-mail' => 'taliabeatriz.c@gmail.com','id' => '9192'),
  array('nome' => 'Dalisa Ribas','e-mail' => '9161@colegio.cefsa.edu.br','id' => '9161')
);
