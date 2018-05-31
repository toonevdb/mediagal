<template>
    <div class="content-list">
        <div class="tools mb-3">
            <p class="float-left">
                You selected {{ this.selected.length }} from the {{ this.items.length }} available items.
            </p>
            <div class="btn-group float-right">
                <button class="btn" @click="selectAll()">select all</button>
                <button class="btn" @click="selectNone()">select none</button>
            </div>
        </div>
        <ul>
            <li v-for="content in items" :key="content.id" v-bind:class="{ selected: isSelected(content.id) }" @click="toggle(content.id)">
                <div class="selection">
                    <svg height="25" width="25" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M21.652 3.211a.747.747 0 0 0-1.061 0L9.41 14.34a.744.744 0 0 1-1.062 0L3.449 9.351a.743.743 0 0 0-1.062 0L.222 11.297a.751.751 0 0 0 .001 1.07l4.94 5.184c.292.296.771.776 1.062 1.07l2.124 2.141a.751.751 0 0 0 1.062 0l14.366-14.34a.762.762 0 0 0 0-1.071l-2.125-2.14z" fill-rule="evenodd"/></svg>
                </div>
                <img :src="content.url" class="img-thumbnail">
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        
        data: () => {
            return {selected: []}
        },

        mounted() {
            console.info('Content list mounted00', this.items, this.selected)
        },

        methods: {
            toggle(id) {
                var index = this.selected.indexOf(id)

                if (index === -1) {
                    this.selected.push(id)
                } else {
                    this.selected.splice(index, 1)
                }
            },

            isSelected(id) {
                var index = this.selected.indexOf(id)

                return index !== -1
            },

            selectAll() {
                this.selected = this.items.reduce((arr, content) => {
                    arr.push(content.id)

                    return arr
                }, [])
            },

            selectNone() {
                this.selected = []
            }
        }
    }
</script>
