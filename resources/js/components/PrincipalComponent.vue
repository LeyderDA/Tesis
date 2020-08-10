<template>
  <div class="card">
    <div>
      <h1 class="text-center mb-2 card-title">MENU DE OPCIONES</h1>
    </div>
    <div class="card-body row">

       <li>
        <router-link :to="{name: 'persona'}"> Crear Personas</router-link>
      </li>

      <li>
        <router-link :to="{name: 'usuario'}">Crear Usuario</router-link>
      </li>


       <li>
        <router-link :to="{name: 'reclamante'}">Crear Reclamantes</router-link>
      </li>

       <li>
        <router-link :to="{name: 'area'}">Crear Areas</router-link>
      </li>

       <li>
        <router-link :to="{name: 'recepcion'}">Crear Recepción</router-link>
      </li>

       <li>
        <router-link :to="{name: 'gestion'}">Gestionar un Caso</router-link>
      </li>

      <li>
        <router-link :to="{name: 'asignacion'}">Asignar Recepción</router-link>
      </li>

      


    </div>

    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>
