<template>
  

  <div style="margin-top:-25px; ">

    <nav class="navbar navbar-expand-lg" style="background-color:#DADADA; color:#000; ">
      <div class="collapse navbar-collapse" id="navbarNav">

        
       
    
        <router-link class="nav-link" :to="{name: 'home'}" >Inicio</router-link>
      
        <router-link class="nav-link" :to="{name: 'recepest'}">Ver Recepciones</router-link>
      

      
        <router-link class="nav-link" :to="{name: 'gestest'}">Ver Gestiones</router-link>
      

    
        <router-link class="nav-link" :to="{name: 'miusuario'}">Ver mi usuario</router-link>
      

       </div>
     </nav>
  
    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
     <div style="height:6px; width:100%; background-color:#ad3333"></div>
  </div>
</template>
