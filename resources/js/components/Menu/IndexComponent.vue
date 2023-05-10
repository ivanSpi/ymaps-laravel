<template>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
    <span class="fs-4 align-self-center">Menu</span>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <RouterLink :to="{name: 'point.current'}" class="nav-link link-dark dropdown" aria-current="page">
          Current point  
        </RouterLink>
      </li>
    </ul>
    <hr>
    <div class="container">
            <RouterView></RouterView>
    </div>

  </div>

</template>


<script>
export default {
    name: 'Index',

    data() {
        return {
            map: null
        }
    },

    mounted() {
        
    },

    methods: {



    }
    
}
</script>