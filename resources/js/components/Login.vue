<template>
    <div class="container">
        <div class="login_form">
            <form class="bg-light" @submit.prevent="handleUserLogin">
                <h3 class="text-center">Login User</h3>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="inputEmail"
                        placeholder="Email"
                        v-model="email"
                    />
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="inputPassword"
                        placeholder="Password"
                        v-model="password"
                    />
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <router-link :to="{ name: 'register' }" class="btn bg-primary"
                    >Register an accoutn</router-link
                >
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        handleUserLogin() {
            axios
                .post("http://localhost:8000/api/v1/login", {
                    email: this.email,
                    password: this.password,
                })
                .thne((res) => {
                    console.log();
                })
                .catch();
            console.log($e.target.value.email);
        },
    },
};
</script>

<style scoped>
.login_form {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    margin: 10rem 0rem;
}

.login_form form {
    width: 50%;
    padding: 20px 10px;
    border-radius: 5px;
}

.login_form form a {
    float: right;
    color: white;
}
</style>
