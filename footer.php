<?session_start()?>
<?php if (isset($_SESSION['acao'])){if(($_SESSION['acao']=='1' )||($_SESSION['acao']=='2')){?>
<div id="div-x-1" class="toast align-items-center position-fixed bottom-0 end-0 p-3 div-x-1" role="alert" aria-live="assertive" aria-atomic="true" style="display:block; margin:10px;">
  <div class="d-flex">
    <div class="toast-body">
      <?php echo $_SESSION['mensagem']?>
    </div>
    <button type="button" id="x-1" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close" onclick="fechar(this.id)"></button>
  </div>
</div>
<?php $_SESSION['acao']='0'?>
<?php }}?>
<script>
  function fechar (id){
    document.getElementById("div-"+id).style.display="none";
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
