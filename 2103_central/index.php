<?php
include ( 'conexao.php' );

if (isset( $ _POST [ 'email' ]) || isset( $ _POST [ 'senha' ])) {

    if (strlen( $ _POST [ 'e-mail' ]) == 0 ) {
        echo " Preencha seu e-mail ";
    } else  if (strlen( $ _POST [ 'senha' ]) == 0 ) {
        echo " Preencha sua senha ";
    } senão {

        $ email = $ mysqli -> real_escape_string ( $ _POST [ 'email' ]);
        $ senha = $ mysqli -> real_escape_string ( $ _POST [ 'senha' ]);

        $ sql_code = " SELECT *FROM usuários WHERE email=' $ email ' AND senha=' $ senha ' ";
        $ sql_query = $ mysqli -> query ( $ sql_code ) ou die(" Falha na execução do código SQL: " . $ mysqli -> error );

        $ quantidade = $ sql_query -> num_rows ;

        if ( $ quantidade == 1 ) {
            
            $ usuário = $ sql_query -> fetch_assoc ();

            if (!isset( $ _SESSION )) {
                sessão_start();
            }

            $ _SESSION [ 'id' ] = $ usuário [ 'id' ];
            $ _SESSION [ 'nome' ] = $ usuário [ 'nome' ];

            header(" Localização: painel.php ");

        } senão {
            echo " Falha ao logar! E-mail ou senha incorreta ";
        }

    }

}
?>
<!DOCTYPEhtml >
< html  lang =" pt " >
< cabeça >
    < meta  charset =" UTF-8 " >
    < meta  http-equiv =" Compatível com X-UA " content =" IE=edge " >
    < meta  name =" viewport " content =" largura = largura do dispositivo, escala inicial = 1,0 " >
    < título > Entrar </ título >
</ cabeça >
< corpo >
    <h1> Acesse sua conta </h1> _ _
    < form  action ="" método =" POST " >
        <p> _ _
            < label > E-mail </ label >
            < tipo de entrada  =" texto " nome =" email " >
        </ p >
        <p> _ _
            < label > Senha </ label >
            < input  type =" senha " nome =" senha " >
        </ p >
        <p> _ _
            < button  type =" submit " > Entrar </ button >
        </ p >
    </ formulário >
</ corpo >
</html> _ _