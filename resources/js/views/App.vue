<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Laravel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/items" class="nav-link">Items</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link v-if="app.currentUser.role === 'admin'" to="/users" class="nav-link">Users (admin)</router-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ app.currentUser.name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container mt-5">
            <router-view></router-view>
        </main>
    </div>
</template>