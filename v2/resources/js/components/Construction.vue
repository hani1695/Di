<template>
  <div>
      
    
        
            <div class="form-group">
            <label for="exampleFormControlSelect1">Zone <span class="text-danger">*</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="zone_id" v-model="zone" @change="getConstructions">
                <option value="" selected disabled>Séléctionner la zone</option>
                <option v-for="zone in zones" :key="zone.id_zone" :value="zone.id_zone" > {{ zone.nom_zone }} </option>
            </select>
            </div>
            <div class="form-group">
                <label for="description" class=" form-control-label">Constructions <span class="text-danger">*</span></label><br>
                <select  multiple class="js-example-basic-multiple2" name="id_const[]" style="width : 100%;">
                    <option v-for="construction in constructions" :key="construction.id_constp" :value="construction.id_constp"> construction : {{ construction.nom }}, adresse : ({{ construction.nom_adressep }}) </option>         
                </select>
            </div>
        
    
    <!--  -->

  </div>
</template>

<script>

export default {
     props : ['eventid'],
    data () {
        return {            
            constructions : [],
            zones : [], 
            zone : '',             
            
        }
    },
    methods : {
        // getWilayas : function () {
        //      axios.get('/api/getWilayas')
        //        .then(function (res) {
        //            this.wilayas = res.data
        //        }.bind(this))
        // },
        // getCommunes : function () {
        //      axios.get('/api/getCommunes',{
        //         params : {
        //             wilaya_id : this.wilaya
        //         }
        //     })
        //     .then (
        //         function (response) {
        //             this.communes = response.data;
        //         }.bind(this)
        //     )
        // },
        getConstructions : function () {
            
            
            
            axios.get('/api/getConstructions',{
                params : {
                    zone_id : this.zone
                }
            })
            .then (
                function (response) {
                    this.constructions = response.data;
                    
                }.bind(this)
            )
        },
        //  isWialayazoneFunc : function () {
        //     let x = null
        //      axios.get('/api/isWialayazone',{
        //         params : {
        //             zone_id : this.zone
        //         }
        //     })
        //     .then (
        //         function (response) {
        //            x =  response.data
        //            console.log(x)
                    
        //         }.bind(this)
        //     )
        //     return x
           
        // },
        getZones : function () {            
            axios.get('/api/getZones',{
                params : {
                    event_id : this.eventid
                }
            })
            .then (
                function (response) {
                    this.zones = response.data;
                }.bind(this)
            )
        }  
    },
    created : function () {
        this.getZones()
    }
}
</script>

<style>

</style>