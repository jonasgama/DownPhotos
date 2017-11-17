
<div id="mensagemErro" class="alert alert-danger alert-autocloseable-danger" hidden="hidden"></div>
<div id="mensagem" class="alert alert-success" hidden="hidden"></div>
<div class="container">
  <br>
  <h2 align="center"><b>Lista de Produtos em seu Carrinho</b></h2>
  <hr>
  <br>
  <div>
    <table id="carrinho" class="table table-filter table-striped">
        <thead>
          <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>
  </div>
  <div class="form-control">
    <div class="col-md-2" id="subtotal" style="float:right;">
    </div>
    <div class="col-md-2" style="float:right;">
      <label>SubTotal: </label>
    </div>  
  </div>
  <br>
  <div id="botaoFinalizar">
    <a class="btn btn-success" style="float:right;" href="/pedido">Finalizar Compra</a>
  </div>
  <br><br>
</div>

<script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>
