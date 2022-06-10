<template>
    <div>
        <Panel class="mb-2">
            <template #panel-heading>
                <h4>Info</h4>
            </template>
            <p>- Select an employee to view classes</p>
            <p :class="{'mb-2': selectedEmployee}">- Select a class to view students</p>

            <div v-if="selectedEmployee" style="display: flex">
                <p>{{ selectedEmployee.forename }} {{ selectedEmployee.surname }}</p>
                <button type="button" @click="reset">Reset</button>
            </div>
        </Panel>
        <Employees @selected="selectEmployee" :selected="selectedEmployee"></Employees>
        <Classes v-if="selectedEmployee" @selected="selectClass" :employee="selectedEmployee" :key="selectedEmployee.id"></Classes>
        <Students v-if="selectedClass" :_class="selectedClass" :key="selectedClass.id"></Students>
    </div>
</template>

<script setup>
import {defineAsyncComponent, ref} from "vue";

    const Panel = defineAsyncComponent(() => import('./layout/Panel'))
    const Employees = defineAsyncComponent(() => import('./components/Employees'))
    const Classes = defineAsyncComponent(() => import('./components/Classes'))
    const Students = defineAsyncComponent(() => import('./components/Students'))

    // Data
    let selectedEmployee = ref(null)
    let selectedClass = ref(null)

    // Methods
    const selectEmployee = (selection) => {
        selectedEmployee.value = selection
    }

    const selectClass = (selection) => {
        selectedClass.value = selection
    }

    const reset = () => {
        selectedEmployee.value = null
        selectedClass.value = null
    }
</script>
