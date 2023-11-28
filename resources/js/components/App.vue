<template>
    <div class="container">
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link
                                    class="nav-link active"
                                    aria-current="page"
                                    :to="{ name: 'dashboard' }"
                                    >Home</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link
                                    class="nav-link"
                                    :to="{ name: 'employee' }"
                                    >Employee</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <router-view />
    </div>
</template>

<script>
export default {
    name: "App",
};
</script>
<style scoped></style>
