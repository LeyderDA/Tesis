<template>
  <div class="card">
    <br />
    <div>
      <h1 class="text-center mb-2 card-title">Crear Firma</h1>
    </div>
    <div class="card-body row">
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <h4 class="text-center mb-2 card-title">
                    Click en el lápiz para crear firma
                  </h4>
                  <br />
                  <a :href="'/CrearFir'">
                    <i
                  
                      class="fas fa-pencil-alt fa-3x"
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
