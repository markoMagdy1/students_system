
<template>
  <div class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" >
              <router-link class="nav-link" to="/students"  aria-current="page" href="#">Students</router-link>
            </li>
            <li class="nav-item" >
              <router-link class="nav-link" href="#"  to="/courses">Courses</router-link>
            </li>
            <li class="nav-item" disabled>
              <a class="nav-link" href="#"  to="/students">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>
<script >
export default {
  name: "AppHeader",
};
</script>

<style >
ul{
    margin-left:  auto;
}
    li{
        font-size: 1.3rem ;
        margin-left: 1rem;
    }
</style>
