<template>
    <div class="container">
        <div class="employee_table">
            <h3 class="text-center">Employee List</h3>

            <router-link
                :to="{ name: 'employee-create' }"
                class="btn btn-sm bg-primary text-white float-right mb-1 ml-2"
                >Create</router-link
            >
            <div class="employee-searach float-right">
                <input
                    type="search"
                    placeholder="Search"
                    v-model="search"
                    @keyup="employeeSearch"
                />
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Department</th>
                        <th scope="col">Achievements</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(employee, index) in employees"
                        :key="employee.id"
                    >
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.address }}</td>
                        <td>
                            {{
                                employee.department.name
                                    ? employee.department.name
                                    : "None"
                            }}
                        </td>
                        <td>
                            <ul>
                                <li v-for="item in employee.achievement">
                                    <span v-if="item.name">{{
                                        item.name
                                    }}</span>
                                    <span v-else>None</span>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a
                                href=""
                                class="btn btn-sm bg-primary text-white mr-1"
                                >View</a
                            >
                            <router-link
                                :to="{
                                    name: 'employee-edit',
                                    params: { id: employee.id },
                                }"
                                class="btn btn-sm bg-warning text-white mr-1"
                                >Edit</router-link
                            >
                            <a
                                href=""
                                @click.prevent="removeEmployee(employee.id)"
                                class="btn btn-sm bg-danger text-white"
                                >Delete</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
            <span>pagination</span>
            <v-pagination :length="4"></v-pagination>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    name: "Employee",
    data() {
        return {
            employees: [],
            search: "",
        };
    },
    methods: {
        async getAllEmployee() {
            try {
                // vue overlay loader
                let loader = this.$loading.show({
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });

                const token = localStorage.getItem("accessToken");
                const response = await axios.get("/api/v1/employee/list", {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.employees = response.data.data.data;
                loader.hide();
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        },
        removeEmployee(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // vue overlay loader
                    let loader = this.$loading.show({
                        container: this.fullPage
                            ? null
                            : this.$refs.formContainer,
                        canCancel: true,
                        onCancel: this.onCancel,
                    });

                    // Api call with token
                    const token = localStorage.getItem("accessToken");
                    axios
                        .get(`/api/v1/employee/delete/${id}`, {
                            headers: {
                                "X-Requested-With": "XMLHttpRequest",
                                Authorization: `Bearer ${token}`,
                            },
                        })
                        .then((response) => {
                            // response back from backend
                            this.employees = response.data.data;
                            this.$toast.open({
                                message: response.data.message,
                                type: "success",
                            });
                            this.getAllEmployee();
                            loader.hide();
                        })
                        .catch((error) => {
                            console.log(error.message);
                        });
                }
            });
        },
        employeeSearch() {
            // vue overlay loader
            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: true,
                onCancel: this.onCancel,
            });

            const token = localStorage.getItem("accessToken");
            axios
                .get(`/api/v1/employee/search?search=${this.search}`, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Authorization: `Bearer ${token}`,
                    },
                })
                .then((response) => {
                    console.log(response.data.data);
                    this.employees = response.data.data;
                    loader.hide();
                })
                .catch((error) => console.log(error.message));
        },
    },
    mounted() {
        this.getAllEmployee();
    },
};
</script>

<style scoped>
.employee_table {
    margin: 2rem 0rem;
}
</style>
