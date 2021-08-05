<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"parkingAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Parking spots</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody v-if="parking.data.length > 0">
                            <tr v-for="(parking_spot,key) in parking.data" :key="key">
                                <td>{{ parking_spot.id }}</td>
                                <td>{{ parking_spot.price }}</td>
                                <td>
                                    <router-link :to='{name:"parkingEdit",params:{id:parking_spot.id}}' class="btn btn-success">Edit</router-link>
                                    <button type="button" @click="deleteParking(parking_spot.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <pagination :data="parking" @pagination-change-page="getParking"></pagination>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" align="center">No Parking spots Found.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import pagination from 'laravel-vue-pagination'
export default {
    name:"parking",
    components: {
        pagination
    },
    data(){
        return {
            parking: {
                type:Object,
                default:null
            }//[]
        }
    },
    mounted(){
        this.getParking()
    },
    methods: {
        async getParking(page){
            if (typeof page === 'undefined') {
                page = 1;
            }

            await this.axios.get(`/api/parking?page=${page}`)
                .then(({data}) => {
                    this.parking = data;
                }).catch(({ response })=>{
                    console.error(response)
                })
        },
        deleteParking(id){
            if(confirm("Are you sure to delete this parking spot ?")){
                this.axios.delete(`/api/parking/${id}`).then(response=>{
                    this.getParking()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
