<template>
  <div>
      
    <div class="row">
        <div class="col">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Wilayas <span class="text-danger">*</span></label>
            <select class="form-control" id="exampleFormControlSelect1" name="fk_wilaya" v-model="wilaya" @change="getCommunes">
                <option value="" selected disabled>Séléctionner la wilaya</option>
                <option v-for="wilaya in wilayas" :key="wilaya.code_w" :value="wilaya.code_w" > {{ wilaya.nom_w }} {{ (wilaya.code_w) }} </option>
            </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
            <label for="exampleFormControlSelect2">Communes <span class="text-danger">*</span></label>
            <select class="form-control" id="exampleFormControlSelect2" name="fk_commune" v-model="commune" @change="getConstructions">
                <option value="" selected disabled>Séléctionner la commune</option>
                <option v-for="commune in communes" :key="commune.code_c" :value="commune.code_c">{{commune.nom_c}} {{(commune.code_c)}}</option>
            </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" form-control-label">Constructions <span class="text-danger">*</span></label><br>
        <select  multiple class="js-example-basic-multiple2" name="id_const[]" style="width : 100%;">
            <option v-for="construction in constructions" :key="construction.id_const" :value="construction.id_const"> {{ construction.nom }} </option>         
        </select>
    </div>

  </div>
</template>

<script>

export default {
    data () {
        return {
            wilayas : [],
            communes : [],
            constructions : [],
            wilaya : '',
            commune : '', 
        }
    },
    methods : {
        getWilayas : function () {
             axios.get('/api/getWilayas')
               .then(function (res) {
                   this.wilayas = res.data
               }.bind(this))
        },
        getCommunes : function () {
             axios.get('/api/getCommunes',{
                params : {
                    wilaya_id : this.wilaya
                }
            })
            .then (
                function (response) {
                    this.communes = response.data;
                }.bind(this)
            )
        },
        getConstructions : function () {
            axios.get('/api/getConstructions',{
                params : {
                    commune_id : this.commune
                }
            })
            .then (
                function (response) {
                    this.constructions = response.data;
                }.bind(this)
            )
        }  
    },
    created : function () {
        this.getWilayas()
    }
}
</script>

<style>

</style>