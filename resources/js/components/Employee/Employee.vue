<template>
    <div class="container">
        <div class="employee_table">
            <h3 class="text-center">Employee List</h3>
            <router-link
                :to="{ name: 'employee-create' }"
                class="btn btn-sm bg-primary text-white float-right mb-1"
                >Create</router-link
            >
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
                        <td>{{ employee.department.name }}</td>
                        <td>
                            <ul>
                                <li v-for="item in employee.achievement">
                                    {{ item.name }}
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
                            <a href="" class="btn btn-sm bg-danger text-white"
                                >Delete</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Employee",
    data() {
        return {
            employees: [],
        };
    },
    methods: {
        async getAllEmployee() {
            try {
                const token =
                    "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGJmMWNjMmE3MGZmZDUyOWYzMDFmM2U2OGI4YWMyZDhiYTdjNmNkOTY5MzcwZmM3YjQ3YzE2NGUyMjRiNjcwMDYwM2FlYTM2YjUxZjc3MzMiLCJpYXQiOjE3MDEyMDU5ODQuMTEwNjc4LCJuYmYiOjE3MDEyMDU5ODQuMTEwNjg2LCJleHAiOjE3MzI4MjgzODMuODQ3OTczLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.DhcQSYIbw-FPaLCqf2NozhA4Gu9zzCTtlt_G3gkRsLgXgXqBVGJMVLltGNt_cIxUTzs5tTLv0HbPul50gi-lo7oqs3OoEVETXrgao-jDkbGvXZcFI-TpPlOjYh97wgrHzuucy-sjoYTO5cDgfoc6tFtncNE2zrgLTLVLE7RVeASJJh5d4B2-jdAGxlCfFap2XHRHSVWCRges6e2rSZ4jg5lnrFKKCgyo_dhiP32rgESO40ymojZQXa3zDtIjGYB-6xRvQxsGK-rqP1lyNvI0sQU532d2wOXGea5_mAW1qZDPHAPpI_QDFWUEzr3_bMQCZ7NlKSuv0G93PymSkD0z8focwtaX-8hwQqYYWTY0Ukb9ZjKoORvtslMsZ9RcqUFXnyfzyeOzMJA0WUS2LH6L5Hs5EL11n_gyrKTj6L55PXDcbxMR2DeLfEGh02JSrgDzq5Ygpv6zXpauNOvaVql8TuB2QqycjuRTS7fHKxlQ4alIWSdLgz1_8RZHIprq-IujKl8naVgIsocrvUS4lpDLWLUIfQHEhJPtu90URiR8fY91foU_y6d2E5sMdDGt11A_uInePclftpZBpTWZNZxtw5mqoD_jKh2rupXegKRKBN2cGGlmyj7kfHdqvYdDmI2gf2mlW8gmBDajHXdX8M__738ayJhkcgG1RaZQCOs-6mg";

                const response = await axios.get("/api/v1/employee/list", {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.employees = response.data.data.data;
            } catch (error) {
                console.error("Error fetching data:", error);
            }
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
