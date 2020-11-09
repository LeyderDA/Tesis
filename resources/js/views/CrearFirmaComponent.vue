<template>
   <div class="card" style="margin-top:25px">
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
                <h4 class="text-center mb-2 card-title">
                  Click en el lápiz para crear firma
                </h4>
                <br /> 
                 <!-- <a :href="'/CrearFir'">
                  <i
                    class="fas fa-pencil-alt fa-3x"
                    style="color: black"
                    title="Crear Firma"
                  ></i>
                </a>     -->

                <a :href="'/CrearFir'" target="_blank"> <i
                    class="fas fa-pencil-alt fa-3x"
                    style="color: black"
                    title="Crear Firma"
                  ></i></a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
