<template>
  <div class="card">
    <div>
      <h1 class="text-center mb-2 card-title">MENU DE OPCIONES</h1>
    </div>
    <div class="card-body row">
      <li>
        <router-link :to="{name: 'area'}">Area</router-link>
      </li>

       <li>
        <router-link :to="{name: 'persona'}">Personas</router-link>
      </li>
    </div>

    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>
