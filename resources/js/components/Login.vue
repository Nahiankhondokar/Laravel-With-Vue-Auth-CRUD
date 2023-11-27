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
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    methods: {
        handleUserLogin($e) {
            console.log($e.target);
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
</style>
