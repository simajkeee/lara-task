<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Parking Spot</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" v-model="parking.price">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-parking",
    data(){
        return {
            parking:{
                price:"",
                // description:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showParking()
    },
    methods:{
        async showParking(){
            await this.axios.get(`/api/parking/${this.$route.params.id}`).then(response=>{
                const { price } = response.data
                this.parking.price = price
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/parking/${this.$route.params.id}`,this.parking).then(response=>{
                this.$router.push({name:"parkingList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
