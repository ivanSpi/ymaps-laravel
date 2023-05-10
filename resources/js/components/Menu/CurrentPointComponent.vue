<template>
    <div>
        <template v-for="point in points">
            <div class="d-flex">
                <span>{{ point.coord }}</span>
                <button class="btn btn-primary" @click.prevent="add(point.coord)">Add</button>
                <button class="btn btn-danger" @click.prevent="delete">Delete</button>
            </div>
        </template>
    </div>
</template>


<script>
export default {
    name: 'Add',

    data() {
        return {
            points: null,
        }
    }, 
    
    methods: {
        add(coord) {
            axios.post('/api/points/{id}', {coord: coord }).
            then( res => console.log(res))
        },

        delete(coord) {
            this.points.remove(coord)
        }
    }
}
</script>