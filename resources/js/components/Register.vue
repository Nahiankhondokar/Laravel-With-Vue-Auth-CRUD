<template>
    <div class="container">
        <div class="login_form">
            <form class="bg-light" @submit.prevent="handleUserRegistration">
                <h3 class="text-center">Register User</h3>
                <div class="form-group">
                    <label for="inputEmail">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        v-model="name"
                    />
                </div>
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
                <div class="form-group">
                    <label for="inputPassword">Confirmed Password</label>
                    <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        v-model="password_confirmation"
                    />
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <router-link :to="{ name: 'login' }" class="btn bg-primary"
                    >Have an account</router-link
                >
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
        };
    },
    methods: {
        handleUserRegistration() {
            axios
                .post("http://localhost:8000/api/v1/register", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                })
                .then((res) => {
                    console.log(res);
                    // this.$route.push("/");
                    router.push({ name: "login" });
                });
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
