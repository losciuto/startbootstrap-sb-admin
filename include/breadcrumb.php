<style>
@media (min-width: 400px) {
    span.icon {display:none}
    span.text {display:contents}
}

@media (max-width: 399px) {
    span.icon {
      display:inline-block;
      padding-left: 20px;
    }
    span.text {display:none}
}
</style>
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?=$area?></li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <span class="text">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100 shadow">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">Personale</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?area=dettpers">
                  <span class="float-left">Dettaglio</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            </span>
            <span class="icon"><a class="" href="index.php?area=dettpers" title="Dettaglio Personale"><i class="fas fa-fw fa-users"></a></i></span>
            <span class="text">           
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100 shadow">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-table"></i>
                  </div>
                  <div class="mr-5">Tipi di Contratti</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?area=dettcontr">
                  <span class="float-left">Dettaglio</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            </span>
            <span class="icon"><a class="" href="index.php?area=dettcontr" title="Dettaglio Contratti"><i class="fas fa-fw fa-table"></a></i></span>
            <span class="text">           
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100 shadow">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-clock"></i>
                  </div>
                  <div class="mr-5">Orari di Lavoro</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?area=dettorari">
                  <span class="float-left">Dettaglio</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            </span>
            <span class="icon"><a class="" href="index.php?area=dettorari" title="Dettaglio Orari"><i class="fas fa-fw fa-clock"></a></i></span>
            <span class="text">           
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user"></i>
                  </div>
                  <div class="mr-5">Utenti</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?area=dettutenti">
                  <span class="float-left">Dettaglio</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            </span>
            <span class="icon"><a class="" href="index.php?area=dettutenti" title="Dettaglio Utenti"><i class="fas fa-fw fa-user"></a></i></span>
          </div>


