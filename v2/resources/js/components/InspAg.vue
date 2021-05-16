<template>
  <div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Agence <span class="text-danger">*</span></label>
        <select class="form-control" id="exampleFormControlSelect1" ref="agence" @change="getInsp()">
            <option disabled selected>Sélectionner une agence</option>  
           

            <option v-for="agence in agences" :key="agence.id" :value="agence.code_ag">{{ agence.nom_ag }} ( {{ agence.code_ag }} )</option>        
        </select>
    </div>
    <div class="form-group col-md-9">
      <label for="exampleFormControlSelect">Inspecteurs <span class="text-danger">*</span></label>
      
        <select class="form-control" id="exampleFormControlSelect" name="user">
            <option disabled selected>Sélectionner un inspecteur</option>  
            <option v-for="insp in insps" :key="insp.id_user_event" :value="insp.id_user_event">{{insp.nom}} {{insp.prenom}} ({{insp.matricule}})</option>        
        </select>
    </div>
  </div>


  </div>
  
</template>

<script>
export default {
    props:['eventid'],
    data () {
        return {
            agences : [],
            agence : '',
            insps : []
        }
    },
    methods : {
        getAgences : function () {
        
             axios.get('/api/getAgences')
               .then(function (res) {
                   this.agences = res.data
               }.bind(this))
        },

        getInsp : function () {
            axios.get('/api/getInsp',{
                params : {
                    agence : this.$refs.agence.value,
                    event_id : this.eventid
                }
            })
            .then (
                function (response) {
                    this.insps = response.data;
                }.bind(this)
            )
        }
    },
    created : function () {
        this.getAgences()
    }
}
</script>

<style>

</style>