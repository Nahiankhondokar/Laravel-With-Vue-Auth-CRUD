<template>
    <div class="container">
        <div class="login_form">
            <form class="bg-light" @submit.prevent="handleEmployeeCreate">
                <h3 class="text-center">Employee Edit</h3>
                <div class="form-group">
                    <label for="inputEmail">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        v-model="employee.name"
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
                </div>
                <div class="form-group">
                    <label for="inputPassword">Phone</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Phone"
                        v-model="employee.phone"
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
                </div>

                <div class="form-group">
                    <label>Department</label><br />
                    <select
                        class="form-control"
                        v-model="employee.department_id"
                    >
                        <option value="" disabled>-Select-</option>
                        <option
                            v-for="department in departments"
                            :key="department.id"
                            :value="department.id"
                        >
                            {{ department.name }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Achievement</label><br />
                    <label
                        v-for="achievement in achievements"
                        :for="achievements.id"
                        style="display: block"
                    >
                        <input
                            type="checkbox"
                            v-model="employee.achievement_id"
                            :id="achievement.id"
                            :value="achievement.id"
                        />
                        {{ achievement.name }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary text-center">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "EmployeeEdit",
    data() {
        return {
            employee: {
                name: "",
                email: "",
                address: "",
                phone: "",
                department_id: "",
                achievement_id: [],
            },
            departments: [],
            achievements: [],
            errors: {},
        };
    },
    methods: {
        async handleEmployeeCreate() {
            this.errors = [];
            const token =
                "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGJmMWNjMmE3MGZmZDUyOWYzMDFmM2U2OGI4YWMyZDhiYTdjNmNkOTY5MzcwZmM3YjQ3YzE2NGUyMjRiNjcwMDYwM2FlYTM2YjUxZjc3MzMiLCJpYXQiOjE3MDEyMDU5ODQuMTEwNjc4LCJuYmYiOjE3MDEyMDU5ODQuMTEwNjg2LCJleHAiOjE3MzI4MjgzODMuODQ3OTczLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.DhcQSYIbw-FPaLCqf2NozhA4Gu9zzCTtlt_G3gkRsLgXgXqBVGJMVLltGNt_cIxUTzs5tTLv0HbPul50gi-lo7oqs3OoEVETXrgao-jDkbGvXZcFI-TpPlOjYh97wgrHzuucy-sjoYTO5cDgfoc6tFtncNE2zrgLTLVLE7RVeASJJh5d4B2-jdAGxlCfFap2XHRHSVWCRges6e2rSZ4jg5lnrFKKCgyo_dhiP32rgESO40ymojZQXa3zDtIjGYB-6xRvQxsGK-rqP1lyNvI0sQU532d2wOXGea5_mAW1qZDPHAPpI_QDFWUEzr3_bMQCZ7NlKSuv0G93PymSkD0z8focwtaX-8hwQqYYWTY0Ukb9ZjKoORvtslMsZ9RcqUFXnyfzyeOzMJA0WUS2LH6L5Hs5EL11n_gyrKTj6L55PXDcbxMR2DeLfEGh02JSrgDzq5Ygpv6zXpauNOvaVql8TuB2QqycjuRTS7fHKxlQ4alIWSdLgz1_8RZHIprq-IujKl8naVgIsocrvUS4lpDLWLUIfQHEhJPtu90URiR8fY91foU_y6d2E5sMdDGt11A_uInePclftpZBpTWZNZxtw5mqoD_jKh2rupXegKRKBN2cGGlmyj7kfHdqvYdDmI2gf2mlW8gmBDajHXdX8M__738ayJhkcgG1RaZQCOs-6mg";

            const formData = new FormData();
            formData.append("name", this.employee.name);
            formData.append("phone", this.employee.phone);
            formData.append("email", this.employee.email);
            formData.append("address", this.employee.address);
            formData.append("department_id", this.employee.department_id);

            this.employee.achievement_id.forEach((id) => {
                formData.append("achievement_id[]", id);
            });

            const headers = {
                "X-Requested-With": "XMLHttpRequest",
                Authorization: `Bearer ${token}`,
            };

            await axios
                .post("/api/v1/employee/create", formData, { headers })
                .then((response) => {
                    this.errors = {};
                    this.$router.push({ name: "employee" });
                    this.$toast.open({
                        message: response.data.message,
                        type: "success",
                    });
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },

        async getAllDepartment() {
            const token =
                "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGJmMWNjMmE3MGZmZDUyOWYzMDFmM2U2OGI4YWMyZDhiYTdjNmNkOTY5MzcwZmM3YjQ3YzE2NGUyMjRiNjcwMDYwM2FlYTM2YjUxZjc3MzMiLCJpYXQiOjE3MDEyMDU5ODQuMTEwNjc4LCJuYmYiOjE3MDEyMDU5ODQuMTEwNjg2LCJleHAiOjE3MzI4MjgzODMuODQ3OTczLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.DhcQSYIbw-FPaLCqf2NozhA4Gu9zzCTtlt_G3gkRsLgXgXqBVGJMVLltGNt_cIxUTzs5tTLv0HbPul50gi-lo7oqs3OoEVETXrgao-jDkbGvXZcFI-TpPlOjYh97wgrHzuucy-sjoYTO5cDgfoc6tFtncNE2zrgLTLVLE7RVeASJJh5d4B2-jdAGxlCfFap2XHRHSVWCRges6e2rSZ4jg5lnrFKKCgyo_dhiP32rgESO40ymojZQXa3zDtIjGYB-6xRvQxsGK-rqP1lyNvI0sQU532d2wOXGea5_mAW1qZDPHAPpI_QDFWUEzr3_bMQCZ7NlKSuv0G93PymSkD0z8focwtaX-8hwQqYYWTY0Ukb9ZjKoORvtslMsZ9RcqUFXnyfzyeOzMJA0WUS2LH6L5Hs5EL11n_gyrKTj6L55PXDcbxMR2DeLfEGh02JSrgDzq5Ygpv6zXpauNOvaVql8TuB2QqycjuRTS7fHKxlQ4alIWSdLgz1_8RZHIprq-IujKl8naVgIsocrvUS4lpDLWLUIfQHEhJPtu90URiR8fY91foU_y6d2E5sMdDGt11A_uInePclftpZBpTWZNZxtw5mqoD_jKh2rupXegKRKBN2cGGlmyj7kfHdqvYdDmI2gf2mlW8gmBDajHXdX8M__738ayJhkcgG1RaZQCOs-6mg";

            const result = await axios.get("/api/v1/department/list", {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Authorization: `Bearer ${token}`,
                },
            });

            this.departments = result.data.data;
        },
        async getAllAchievement() {
            const token =
                "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOGJmMWNjMmE3MGZmZDUyOWYzMDFmM2U2OGI4YWMyZDhiYTdjNmNkOTY5MzcwZmM3YjQ3YzE2NGUyMjRiNjcwMDYwM2FlYTM2YjUxZjc3MzMiLCJpYXQiOjE3MDEyMDU5ODQuMTEwNjc4LCJuYmYiOjE3MDEyMDU5ODQuMTEwNjg2LCJleHAiOjE3MzI4MjgzODMuODQ3OTczLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.DhcQSYIbw-FPaLCqf2NozhA4Gu9zzCTtlt_G3gkRsLgXgXqBVGJMVLltGNt_cIxUTzs5tTLv0HbPul50gi-lo7oqs3OoEVETXrgao-jDkbGvXZcFI-TpPlOjYh97wgrHzuucy-sjoYTO5cDgfoc6tFtncNE2zrgLTLVLE7RVeASJJh5d4B2-jdAGxlCfFap2XHRHSVWCRges6e2rSZ4jg5lnrFKKCgyo_dhiP32rgESO40ymojZQXa3zDtIjGYB-6xRvQxsGK-rqP1lyNvI0sQU532d2wOXGea5_mAW1qZDPHAPpI_QDFWUEzr3_bMQCZ7NlKSuv0G93PymSkD0z8focwtaX-8hwQqYYWTY0Ukb9ZjKoORvtslMsZ9RcqUFXnyfzyeOzMJA0WUS2LH6L5Hs5EL11n_gyrKTj6L55PXDcbxMR2DeLfEGh02JSrgDzq5Ygpv6zXpauNOvaVql8TuB2QqycjuRTS7fHKxlQ4alIWSdLgz1_8RZHIprq-IujKl8naVgIsocrvUS4lpDLWLUIfQHEhJPtu90URiR8fY91foU_y6d2E5sMdDGt11A_uInePclftpZBpTWZNZxtw5mqoD_jKh2rupXegKRKBN2cGGlmyj7kfHdqvYdDmI2gf2mlW8gmBDajHXdX8M__738ayJhkcgG1RaZQCOs-6mg";

            const result = await axios.get("/api/v1/achievement/list", {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Authorization: `Bearer ${token}`,
                },
            });

            this.achievements = result.data.data;
        },
    },
    mounted() {
        this.getAllDepartment();
        this.getAllAchievement();
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
