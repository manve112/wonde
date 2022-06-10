<template>
    <Panel class="mb-2">
        <template #panel-heading>
            <h3>Students</h3>
            <p>Please select a class to view students.</p>
        </template>
        <table id="students" v-if="!isLoading && students.length">
            <thead>
            <tr>
                <th>Forename</th>
                <th>Surname</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students">
                <td>{{ student.forename }}</td>
                <td>{{ student.surname }}</td>
            </tr>
            </tbody>
        </table>
        <p v-else>Loading...</p>
        <p v-if="!isLoading && !students.length">No students found.</p>
    </Panel>
</template>

<script setup>
    import {defineAsyncComponent, onMounted, ref} from "vue";

    // Props
    const props = defineProps({
        '_class': Object
    })

    // Components
    const Panel = defineAsyncComponent(() => import('../layout/Panel'))

    // Data
    let students  = ref([])
    let isLoading = ref(false)

    // Methods
    const fetchStudents = () => {
        isLoading.value = true
        axios.get(`/api/class/${props._class.id}/students`).then(({ data }) => {
            students.value = [...data]
        }).finally(() => isLoading.value = false)
    }

    onMounted(() => {
        fetchStudents()
    })
</script>
