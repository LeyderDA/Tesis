<template>
  <div class="card">
    <div>
      <h1 class="text-center mb-2 card-title">MENU DE OPCIONES</h1>
    </div>
    <div class="card-body row">
      <li>
        <router-link :to="{name: 'home'}">Inicio</router-link>
      </li>

      <li>
        <router-link :to="{name: 'recepest'}">Ver Recepciones</router-link>
      </li>

      <li>
        <router-link :to="{name: 'gestdocente'}">Ver Gestiones</router-link>
      </li>

       <li>
        <router-link :to="{name: 'notas'}">Asignar Notas</router-link>
      </li>

      <li>
        <router-link :to="{name: 'observaciones'}">Ver Observaciones</router-link>
      </li>

      <li>
        <router-link :to="{name: 'miusuario'}">Ver mi usuario</router-link>
      </li>

    </div>

    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>
