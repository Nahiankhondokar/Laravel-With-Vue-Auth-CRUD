<template>
    <div class="container">
        <div class="menu" v-if="isLoggedIn">
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
                                <router-link
                                    v-if="!isLoggedIn"
                                    class="nav-link"
                                    :to="{ name: 'login' }"
                                    >LogIn</router-link
                                >
                            </li>

                            <li class="nav-item">
                                <a
                                    v-if="isLoggedIn"
                                    class="nav-link"
                                    @click.prevent="handleUserLogout"
                                    href="#"
                                    >LogOut</a
                                >
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
    data() {
        return {
            isLoggedIn: false,
        };
    },
    methods: {
        userLoggedInCheck() {
            const token = localStorage.getItem("accessToken");
            if (!token) {
                this.isLoggedIn = false;
            } else {
                this.isLoggedIn = true;
            }
        },
        async handleUserLogout() {
            const token = localStorage.getItem("accessToken");
            await axios
                .get("/api/v1/logout", {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Authorization: `Bearer ${token}`,
                    },
                })
                .then((response) => {
                    console.log(response);
                    localStorage.removeItem("accessToken");
                    this.$router.push("/login");
                    this.isLoggedIn = false;
                })
                .catch((error) => console.log(error.message));
        },
    },
    mounted() {
        this.userLoggedInCheck();
    },
};
</script>
<style scoped></style>
