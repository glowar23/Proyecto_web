<?php require_once('Views/Generals/header_admin.php');
  getModal('modalRoles',$data);
?>
  <main class="app-content">
      <div class="app-title">
        <div>
          <div>
            <h1><i class="bi bi-speedometer"></i> <?=$data['page_title']?></h1>   
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
            </h1>
        </div>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="#">Roles de usuario</a></li>
        </ul>
      </div>
      <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableRoles">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Status</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>	
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
    <script> const base_url="<?=base_url()?>"</script>
<?php require_once('Views/Generals/footer_admin.php')?>