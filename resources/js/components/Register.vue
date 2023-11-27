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
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</template>

<script setup></script>

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
