<template>
  <div>
    <nav
      class="navbar navbar-expand-sm"
      style="background-color: #dadada; color: #000; height: 30px"
    >
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo02"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span>MENÚ</span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-8 mt-lg-12">
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'home' }"
              >Inicio</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'notificaciones' }"
              >Notificaciones</router-link
            >
          </li>

          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'reportes' }"
              >Reportes</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'buscarqr' }"
              >Buscar por QR</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'crearfirma' }"
              >Crear Firma</router-link
            >
          </li>

          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle nav-link"
              data-toggle="dropdown"
            >
              Personas <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'persona' }"
                  >Registrar Personas</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'personavista' }"
                  >Ver lista de Personas</router-link
                >
              </li>
            </ul>
          </div>

          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle nav-link"
              data-toggle="dropdown"
            >
              Roles <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'usuario' }"
                  >Asignar rol</router-link
                >
              </li>

              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'usuariovista' }"
                  >Ver lista de todos roles</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'userdocente' }"
                  >Ver lista de los docentes</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'useradminis' }"
                  >Ver lista de los estudiantes con cargo administrativos</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'userabogado' }"
                  >Ver lista de los abogados en formación</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'useradmin' }"
                  >Ver Administrator(es)</router-link
                >
              </li>
            </ul>
          </div>

          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle nav-link"
              data-toggle="dropdown"
            >
              Usuarios <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'reclamante' }"
                  >Crear usarios</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'reclamantevista' }"
                  >Listado de Usuarios</router-link
                >
              </li>
            </ul>
          </div>

          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'area' }"
              >Crear Áreas</router-link
            >
          </li>

          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle nav-link"
              data-toggle="dropdown"
            >
              Recepciones <span></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'recepcion' }"
                  >Crear Recepción</router-link
                >
              </li>

              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'misrecepciones' }"
                  >Mis Recepciones</router-link
                >
              </li>

              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'vistaresu' }"
                  >Recepciones Activas</router-link
                >
              </li>

              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'recepestadosuper' }"
                  >Recepciones Inactivas</router-link
                >
              </li>
            </ul>
          </div>
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle nav-link"
              data-toggle="dropdown"
            >
              Gestiones <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'gestdocente' }"
                  >Ver Listado de mis gestiones</router-link
                >
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'allgestiones' }"
                  >Ver Listado de todas las gestiones</router-link
                >
              </li>
            </ul>
          </div>

          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'asignacionvista' }"
              >Lista de Asignaciones</router-link
            >
          </li>

          <div class="btn-group">
            <button
              type="button"
              class="btn btn-default dropdown-toggle nav-link"
              data-toggle="dropdown"
            >
              Estadísticas<span></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-link">
                <a :href="'/Est'">Casos activos e inactivos </a>
              </li>

              <li class="nav-link">
                <a :href="'/Est2'">Foros activos e inactivos </a>
              </li>
            </ul>
          </div>
        </ul>
      </div>
    </nav>

    <transition name="slide-fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>
