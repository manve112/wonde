<template>
    <Panel class="mb-2">
        <template #panel-heading>
            <h3>Classes</h3>
            <p>Please select an employee to view the classes for.</p>
        </template>
        <table id="classes" v-if="!isLoading && classes.length">
            <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="_class in classes">
                <td>{{ _class.name }}</td>
                <td>
                    <button type="button" @click="$emit('selected', _class)">Select</button>
                </td>
            </tr>
            </tbody>
        </table>
        <p v-else>Loading...</p>
        <p v-if="!isLoading && !classes.length">No classes found.</p>
    </Panel>
</template>

<script setup>
    import {defineAsyncComponent, onMounted, ref} from "vue";

    // Props
    const props = defineProps({
        employee: Object
    })

    // Components
    const Panel = defineAsyncComponent(() => import('../layout/Panel'))

    // Data
    let classes   = ref([])
    let isLoading = ref(false)

    // Methods
    const fetchClasses = () => {
        isLoading.value = true
        axios.get(`/api/employee/${props.employee.id}/classes`).then(({ data }) => {
            classes.value = [...data]
        }).finally(() => isLoading.value = false)
    }

    onMounted(() => {
        fetchClasses()
    })
</script>
