<html>
    <h1><?php echo $titulo; ?></h1>
    <a href="mailto:meu.email@gmail.com">Mandar um email</a>
<!--    <h1>Contato</h1>-->
<!--    <form  method="POST">-->
<!--        --><?php
//            if(!empty($aviso)){
//                $aviso."<br/><br/>";
//            }
//        ?>
<!--        Nome:-->
<!--        <input type="text" name="nome"/>-->
<!--        -->
<!--        <br/>-->
<!--        -->
<!--        Email:-->
<!--        <input type="email" name="email" id=""/>-->
<!--        -->
<!--        <br/>-->
<!--        -->
<!--        Mensagem:-->
<!---->
<!--        <textarea name="mensagem" id="" cols="30" rows="10">-->
<!---->
<!--        </textarea>-->
<!--        <br/>-->
<!--        <input type="submit" value="Enviar Mensagem"/>-->
<!--    </form>-->

</html>

<?php
//
//   $dados = array(
//       'aviso' => ''
//   );
//if(isset($_POST['nome']) && !empty($_POST['nome'])){
//    $nome = addslashes($_POST['nome']);
//    $email = addslashes($_POST['email']);
//    $message = addslashes($_POST['mensagem']);
//
//    $para = "";
//    $assunto ="";
//    $msgg = "Nome".$nome."<br/>Email:".$email."<br/>Message";
//    $cabecalho = "FROM ,,,"."\r\n".'Reply-to'.$email. "\r\n".phpversion();
//
//    mail($para,$assunto,$msgg,$cabecalho);
//    $dados['aviso'] = "Email enviado com sucesso.";
//
//}