<template>
    <Panel class="mb-2" v-if="!selected">
        <template #panel-heading>
            <h3>Employees</h3>
        </template>
        <table id="employees" v-if="!isLoading">
            <thead>
                <tr>
                    <th>Forename</th>
                    <th>Surname</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="employee in employees">
                    <td>{{ employee.forename }}</td>
                    <td>{{ employee.surname }}</td>
                    <td>
                        <button type="button" @click="$emit('selected', employee)">Select</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p v-else>Loading...</p>
    </Panel>
</template>

<script setup>
    import {defineAsyncComponent, onMounted, ref} from "vue";

    // Props
    const props = defineProps({
        selected: Object
    })

    // Components
    const Panel = defineAsyncComponent(() => import('../layout/Panel'))

    // Data
    let employees = ref([])
    let isLoading = ref(false)

    // Methods
    const fetchEmployees = () => {
        isLoading.value = true
        axios.get('/api/employee').then(({ data }) => {
            employees.value = [...data]
        }).finally(() => isLoading.value = false)
    }

    onMounted(() => {
        fetchEmployees()
    })
</script>
