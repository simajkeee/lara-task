<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Parking spot</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" v-model="parking.price">
                                </div>
                            </div>
<!--                            <div class="col-12 mb-2">-->
<!--                                <div class="form-group">-->
<!--                                    <label>Description</label>-->
<!--                                    <input type="text" class="form-control" v-model="category.description">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"add-parking",
    data(){
        return {
            parking:{
                price: ""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/parking', this.parking).then(response => {
                this.$router.push({name:"parkingList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
