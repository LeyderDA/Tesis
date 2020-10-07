<template>
  <div>
   <nav class="navbar navbar-expand-sm" style="background-color:#DADADA; color:#000; height:30px">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
     <span>MENÚ</span>
   </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">   
      
      <li class="nav-item">
        <router-link class="nav-link" :to="{name: 'home'}">Inicio</router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" :to="{name: 'recepdoc'}">Ver Recepciones</router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" :to="{name: 'gestdocente'}">Ver Listado de Gestiones</router-link>
      </li>

       <li class="nav-item">
        <router-link class="nav-link" :to="{name: 'notas'}">Ver  Listado de Notas</router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" :to="{name: 'observaciones'}">Ver Observaciones</router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" :to="{name: 'miusuario'}">Ver mi usuario</router-link>
      </li>

      </ul>
       </div>
     </nav>
  
    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
     
  </div>

</template>
