<?php
require ("../header.php");
?>
<!--==========================
  Cadastro de Usuario
  ============================-->  

  <br>
    <section class="img_cadastros">
  
     <div class="container font">
        <div class="font">
          <form action="" method="post">
           
        <div class="form-group">
          <label for="exampleInputPassword1">Usuario</label>
          <input type="text" name="nome" class="form-control" id="exampleInputPassword1" placeholder="Digite o nome da Escola">
        </div>

  
          <div class="row">
          <div class="col">
              <label for="exampleInputPassword1">CNPJ</label>

              <input type="text" class="form-control" placeholder="Digite seu CNPJ" name="cnpj">
          </div>
          <div class="col">
              <label for="exampleInputPassword1">Telefone</label>
              <input type="text" class="form-control" placeholder="Digite seu Telefone" name="telefone">

          </div>
          </div>
    
        <br>
    
          <div class="row">
          <div class="col">
              <label for="exampleInputPassword1">Endereço</label>

              <input type="text" class="form-control" placeholder="Digite seu Enderço" name="endereco">
          </div>
          <div class="col">
              <label for="exampleInputPassword1">Nº</label>
              <input type="text" class="form-control" placeholder="Digite o número da Residência" name="numero">

          </div>
          </div>
 
        <br>

          <div class="row">
          <div class="col">
              <label for="exampleInputPassword1">Cidade</label>

              <input type="text" class="form-control" placeholder="Digite sua Cidade" name="cidade">
          </div>
          <div class="col">
              <label for="exampleInputPassword1">Estado</label>
              <input type="text" class="form-control" placeholder="Digite seu Estado" name="estado">

          </div>
          </div>
   
        <br>

          <div class="row">
          <div class="col">
              <label for="exampleInputPassword1">País</label>

              <input type="text" class="form-control" placeholder="Digite seu Pais" name="pais">
          </div>
          <div class="col">
              <label for="exampleInputPassword1">CEP</label> 
              <input type="text" class="form-control" placeholder="Digite seu CEP" name="cep">

          </div>
          </div>
      <br>     
     
         <div class="row">
         <div class="col">
            <label for="exampleFormControlSelect1">Tipo de Escola</label>
            <select class="form-control" id="exampleFormControlSelect1" name="tipo_escola">
              <option>Escolher...</option>
              <option>Particular</option>
              <option>Pública</option>
              
            </select>
          </div>

         

        </form>

          <div class="col">

            <label for="exampleFormControlSelect1">Tipo de Ensino</label>

            <select class="form-control" id="exampleFormControlSelect1">
              <option>Escolher...</option>
              <option>Fundamental 01</option>
              <option>Fundamental 02</option>
              <option>Médio</option>
              <option>Fundamental 02 / Médio</option>
              <option>Fundamental 01 / Fundamental 02 / Médio</option>
              <option>Fundamental 01 / Fundamental 02</option>
              <option>Ensino Superior</option>
              <option>Pós-Graduação</option>
              <option></option>
            </select>
          </div>
          </div>
          <br>
          <div class="row">
          <div class="col">
              <label for="exampleInputPassword1">Nome de usuário</label>
              <input type="text" class="form-control" placeholder="Digite seu nome de usuário" name="usuario">
          </div>
          <div class="col">
              <label for="exampleInputPassword1">Senha</label> 
              <input type="password" class="form-control" placeholder="Digite sua senha" name="senha">
          </div>
          </div>

         
          <br>
          <div class="right_button">
              <button type="submit" class="btn btn-primary tamanho_button">Enviar</button>
          </div>
          <br>
        </div>

        </form>

  </div>
  </section>      
 
  
<?php
require ("../footer.php");
?>
=======

<?php require '../exe/conexao_exe.php'; ?>
<!--==========================
  Cadastro de Usuario
  ============================-->
<main>
  <!-- Cadastro -->
  <h1 align="center">Cadastro de Usuários</h1>
  <section class="img_cadastros">
    <div class="container font">
      <div class="font">
        <form action="../exe/cadastro_usuario_exe.php" method="post">
          <div class="row">
            <div class="col">
              <label for="exampleInputPassword1">Usuário</label>
              <input type="text" class="form-control" placeholder="Digite o nome do usuario" required="required" name="usuario">
            </div>
            <div class="col">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" required="required" name="senha">
            </div>
          </div><br>
          <div class="row">
            <div class="col">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" placeholder="Digite seu Email" required="required" name="email">
            </div>
            <div class="col">
              <label for="exampleInputPassword1">Tipo de Usuário</label>
              <input type="text" class="form-control" placeholder="Digite o tipo de usuario" required="required" name="tipo_usuario">
            </div>
          </div><br>
          <div class="row">
            <div class="col">
              <div class="right_button">

                <button type="submit" class="btn btn-primary tamanho_button">Salvar</button>

              </div>
            </div>
          </div>
        </form>
      </div><br>
      <!-- Fim cadastro -->

      <!-- Tabela de cadastrados -->
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome de usuário</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $email = $_SESSION['email'];
            $consulta = "SELECT cod_usuario, usuario, email, tipo_usuario FROM usuario WHERE email = '$email'";
            $resultado = mysqli_query($conexao, $consulta);
            $array = mysqli_fetch_array($resultado);
          ?>
            <tr>
              <td><?php echo $array['cod_usuario']; ?></td>
              <td><?php echo $array['usuario']; ?></td>
              <td><?php echo $array['email']; ?></td>
              <td><?php echo $array['tipo_usuario']; ?></td>
              <td><button type="button" class="btn btn-danger">Excluir</button></td>
            </tr>
          <?php
            $cod_escola = $_SESSION['cod_escola'];
            $consulta = "SELECT cod_usuario, usuario, email, tipo_usuario FROM usuario WHERE tipo_usuario != 'Administrador' AND cod_escola = '$cod_escola'";
            $resultado = mysqli_query($conexao, $consulta);
            while ($array = mysqli_fetch_assoc($resultado)) {
          ?>
            <tr>
              <td><?php echo $array['cod_usuario']; ?></td>
              <td><?php echo $array['usuario']; ?></td>
              <td><?php echo $array['email']; ?></td>
              <td><?php echo $array['tipo_usuario']; ?></td>
              <td><button type="button" class="btn btn-danger">Excluir</button></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <!-- Fim tabela de cadastrados -->
    </div>
  </section>
</main>
>>>>>>> upstream/master
