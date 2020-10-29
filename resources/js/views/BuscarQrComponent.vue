<template>
  <div class="card">
    <br />
    <div>
      <h1 class="text-center mb-2 card-title">Busqueda por QR</h1>
    </div>
    <div class="card-body row">
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <h4 class="text-center mb-2 card-title">
                    Click en el Ícono para elegir tu busqueda
                  </h4>
                  <br />
                  <a :href="'/qr'">
                    <i
                      class="fas fa-search fa-3x"
                      style="color: black"
                      title="Buscar por QR"
                    ></i>
                  </a>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
