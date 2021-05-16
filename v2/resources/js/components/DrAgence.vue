<template>
  <div class="form-row"> 
         
    <div class="form-group col-md-4">
        <label for="organisme">Organisme <span class="text-danger">*</span></label>
        <select :class="orgerror=='' ? 'form-control' : 'form-control is-invalid'" id="organisme" name="organisme" ref="organisme" @change="getDrs">        
            <option value="" :selected='org==""'>Séléctionner L'organisme</option>           
            <option v-for="or in organismes" v-bind:key="or.id" :value="or.nom" :selected="or.nom==org">{{ or.nom }}</option>
        </select>
        <span class="invalid-feedback" role="alert" v-if="orgerror">{{ orgerror }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="dr">Direction <span class="text-danger">*</span></label>
        <select :class="nomdrerror=='' ? 'form-control' : 'form-control is-invalid'" id="dr" name="nom_dr" ref="dr" @change="getStructures">
            <option value="" :selected='this.nomdr==""'> {{ (drs.length==0)? 'Liste DR vide': 'Sélectionner La Direction' }}</option>
            <option :value=this.nomdr v-if="this.nomdr" :selected=true>{{ this.nomdr }}</option>             
            <option v-for="direction in drs" v-bind:key="direction.nom" :value="direction.nom" >{{ direction.nom }}</option>           
            
        </select>
        <span class="invalid-feedback" role="alert" v-if="nomdrerror">{{ nomdrerror }}</span>
    </div>

    <div class="form-group col-md-4">
        <label for="agence">Structure <span class="text-danger">*</span></label>
        <select :class="sterror=='' ? 'form-control' : 'form-control is-invalid'" name="structure" id="agence" ref="structure">
            <option  value="" :selected='this.st==""'>  {{ (structures.length==0)? 'Liste structure vide': 'Séléctionner La Structure' }}</option>
            <option :value=this.st v-if="this.st" :selected=true>{{ this.st }}</option>
            <option v-for="st in structures" v-bind:key="st.code_ag" :value="st.nom_ag">{{ st.nom_ag}}</option>            
        </select>
        <span class="invalid-feedback" role="alert" v-if="sterror">{{ sterror }}</span>
    </div>
</div>
</template>

<script>
export default {
    data () {
        return {            
            structures : [],
            organismes : [],
            drs:[],
        }
    },
    props : ['org','nomdr','st','orgerror','nomdrerror','sterror'],
    methods : {
        getOrganisme : function () {            
            
             axios.get('/api/getorganismes')
               .then(function (res) {
                   this.organismes = res.data
               }.bind(this))
        },
        getDrs : function () {
            this.nomdr=""
            this.st=""
            this.structures = []
            
            axios.get('/api/getdrs',{
                params : {
                    id : this.$refs.organisme.value
                }
            })
            .then (
                function (response) {
                    this.drs = response.data;
                }.bind(this)
            )
        },
        getStructures : function () {
            this.st=""
            axios.get('/api/getstuctures',{
                params : {
                    nomDr : this.$refs.dr.value
                }
            })
            .then (
                function (response) {
                    this.structures = response.data;
                }.bind(this)
            )
        }
    },
    computed : {
        organismeFiltre: function () {
            return this.organismes.filter(org => org.nom != this.org)
        }
    },
    mounted :  function () {
        this.getOrganisme()    
             
    },
    created : function () {
        console.log(this.org)  
    }
    
}
</script>

<style>

</style>