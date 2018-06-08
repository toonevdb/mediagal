<template>
    <div class="content-actions">
        <div class="row">
            <div class="col-xs-12">
                <content-list :items="items"></content-list>
            </div>
        </div>
        <div class="row">
            <div class="col-12" v-for="componentName in contentActions" :key="componentName">
                <component v-bind:is="componentName"></component>
            </div>
        </div>
    </div>
</template>

<script>
    import {contentActionComponents} from '../plugins'

    export default {
        props: ['items'],

        data: function () {
            return {contentActions: contentActionComponents}
        },

    }
</script>