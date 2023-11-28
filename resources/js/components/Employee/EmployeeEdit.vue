<template>
    <div class="container">
        <div class="login_form">
            <form class="bg-light" @submit.prevent="handleUserRegistration">
                <h3 class="text-center">Empoyee Edit</h3>
                <div class="form-group">
                    <label for="inputEmail">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        v-model="employee.name"
                    />
                    <div
                        v-if="employee.errors.has('name')"
                        v-html="employee.errors.get('name')"
                        class="text-danger"
                    />
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="inputEmail"
                        placeholder="Email"
                        v-model="employee.email"
                    />
                    <div
                        v-if="employee.errors.has('email')"
                        v-html="employee.errors.get('email')"
                        class="text-danger"
                    />
                </div>
                <div class="form-group">
                    <label for="inputPassword">Phone</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Pasphonesword"
                        v-model="employee.phone"
                    />
                    <div
                        v-if="employee.errors.has('phone')"
                        v-html="employee.errors.get('phone')"
                        class="text-danger"
                    />
                </div>
                <div class="form-group">
                    <label for="inputPassword">Address</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Address"
                        v-model="employee.address"
                    />
                    <div
                        v-if="employee.errors.has('address')"
                        v-html="employee.errors.get('address')"
                        class="text-danger"
                    />
                </div>

                <div class="form-group">
                    <label for="inputPassword">Department</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Address"
                        v-model="employee.address"
                    />
                    <div
                        v-if="employee.errors.has('address')"
                        v-html="employee.errors.get('address')"
                        class="text-danger"
                    />
                </div>

                <div class="form-group">
                    <label for="inputPassword">Achievement</label>
                    <input
                        type="checkout"
                        class="form-control"
                        placeholder="Address"
                        v-model="employee.address"
                    />
                    <div
                        v-if="employee.errors.has('address')"
                        v-html="employee.errors.get('address')"
                        class="text-danger"
                    />
                </div>
                <button type="submit" class="btn btn-primary text-center">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import Form from "vform";

export default {
    name: "EmployeeEdit",
    data() {
        return {
            employee: new Form({
                name: "",
                email: "",
                address: "",
                phone: "",
            }),
            user: {},
        };
    },
    methods: {
        // handleUserRegistration() {
        //     this.employee
        //         .post("/api/v1/employee/create", {
        //             name: this.name,
        //             email: this.email,
        //             password: this.password,
        //             password_confirmation: this.password_confirmation,
        //         })
        //         .then((res) => {
        //             this.$router.push({ path: "/employee" });
        //             this.$toast.open({
        //                 message: res.data.message,
        //                 type: "success",
        //             });
        //         });
        // },
    },
    mounted() {
        // this.getAuthUser();
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
    margin: 2rem 0rem;
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
